from flask import Flask, jsonify, request
import pandas as pd
from sklearn.metrics.pairwise import cosine_similarity
from sqlalchemy import create_engine

app = Flask(__name__)

# Configure your MySQL connection
DB_USERNAME = 'root'
DB_PASSWORD = '12345678'
DB_HOST = '127.0.0.1'
DB_PORT = '3306'
DB_DATABASE = 'ecommerce'

# Create a SQLAlchemy engine
engine = create_engine(f'mysql://{DB_USERNAME}:{DB_PASSWORD}@{DB_HOST}:{DB_PORT}/{DB_DATABASE}')

# Load rating data from MySQL
query_ratings = 'SELECT * FROM ratings'
rating_data = pd.read_sql(query_ratings, engine)
new_column_names = [
    "id",
    "userId",
    "productId",
    "rating",
    "create_at",
    "orderId",
    "comment"
]
rating_data.columns = new_column_names

# Tính toán số lượng đánh giá của mỗi người dùng (userId) và loại bỏ những người dùng có ít hơn RATINGS_CUTOFF đánh giá
ratings_count = rating_data['userId'].value_counts().to_dict()

RATINGS_CUTOFF = 2
remove_users = [user for user, count in ratings_count.items() if count < RATINGS_CUTOFF]
rating_data = rating_data[~rating_data['userId'].isin(remove_users)]

# Tính toán số lượng đánh giá của mỗi sản phẩm (productId) và loại bỏ những sản phẩm có ít hơn RATINGS_CUTOFF đánh giá
ratings_count_products = rating_data['productId'].value_counts().to_dict()

remove_products = [prod for prod, count in ratings_count_products.items() if count < RATINGS_CUTOFF]
df_final = rating_data[~rating_data['productId'].isin(remove_products)]

df_info = rating_data.info()

missing_values = rating_data.isnull().sum().sum()

df_final_description = df_final.describe().T

rating_counts = df_final['rating'].value_counts()

# Create DataFrames for order and order_detail
query_orders = 'SELECT * FROM orders'
order_data = pd.read_sql(query_orders, engine)
new_column_names_orders = [
    "id",
    "order_code",
    "user_id",
    "order_date",
    "ship_date",
    "status",
    "deleted",
    "payment_id",
    "paid",
    "pay_date",
    "note",
    "shipper_id",
    "city",
    "district",
    "ward",
    "address",
    "subtotal",
    "discount",
    "total",
    "shop_id",
]
order_data.columns = new_column_names_orders

query_orderDetails = 'SELECT * FROM order_details'
order_detail_data = pd.read_sql(query_orderDetails, engine)

new_column_orderdetail = [
    "id",
    "order_id",
    "product_id",
    "quantity",
    "total",
]
order_detail_data.columns = new_column_orderdetail

# Merge order and order_detail để có lịch sử mua hàng
purchase_history = pd.merge(order_data, order_detail_data, left_on='id', right_on='order_id', how='inner')[['user_id', 'product_id']]

# Tạo ma trận người dùng-sản phẩm (binary representation)
user_item_matrix = purchase_history.pivot_table(index='user_id', columns='product_id', aggfunc='size', fill_value=0)

# Tính toán độ tương đồng cosine giữa người dùng
user_similarity = cosine_similarity(user_item_matrix)

# Map actual user IDs to a range of integers
user_id_to_index = {user_id: index for index, user_id in enumerate(user_item_matrix.index)}

# Hàm để lấy các người dùng tương tự
def get_similar_users(user_id, threshold=0.25):
    # Kiểm tra xem user_id có trong bản đồ ánh xạ hay không
    if user_id not in user_id_to_index:
        return []

# Lấy chỉ số tương ứng với user_id trong ma trận độ tương đồng
    user_index = user_id_to_index[user_id]

    # Lấy vector tương đồng cosine của user_id
    similar_users = user_similarity[user_index]

    # Lọc ra các người dùng có độ tương đồng lớn hơn hoặc bằng ngưỡng threshold
    similar_users = [(i, score) for i, score in enumerate(similar_users) if i != user_index and score >= threshold]
    # Sắp xếp danh sách theo độ tương đồng giảm dần
    similar_users.sort(key=lambda x: x[1], reverse=True)
    print(similar_users)
    return similar_users

# Hàm để gợi ý sản phẩm dựa trên người dùng tương tự
def recommend_products(user_id, num_recommendations=10, threshold=0.25):
    # Lấy danh sách người dùng tương tự dựa trên độ tương đồng
    similar_users = get_similar_users(user_id, threshold)

# Lấy tất cả sản phẩm đã mua bởi người dùng hiện tại
    user_purchases = set(purchase_history[purchase_history['user_id'] == user_id]['product_id'])

# Danh sách để lưu trữ các sản phẩm được gợi ý
    recommendations = []

    # Duyệt qua danh sách người dùng tương tự và gợi ý sản phẩm
    for similar_user_index, similarity_score in similar_users:
        # Lấy user_id của người dùng tương tự
        similar_user_id = user_item_matrix.index[similar_user_index]

        # Lấy tất cả sản phẩm đã mua bởi người dùng tương tự
        similar_user_purchases = set(purchase_history[purchase_history['user_id'] == similar_user_id]['product_id'])

        # Lọc ra các sản phẩm mới mà người dùng hiện tại chưa mua
        new_products = similar_user_purchases - user_purchases

        # Thêm các sản phẩm mới vào danh sách gợi ý
        recommendations.extend(new_products)

# Kiểm tra nếu đã đủ số lượng gợi ý thì dừng lại
        if len(recommendations) >= num_recommendations:
            break

    return recommendations[:num_recommendations]

# Function to get top N products with at least min_interactions interactions
def top_n_products(data, n, min_interactions=100):
    recommendations = data[data['rating_count'] >= min_interactions].sort_values(by='avg_rating', ascending=False)
    return recommendations.head(n)

# API endpoint for top ratings and product recommendations
@app.route('/api/recommendations', methods=['GET'])
def get_ratings_and_recommendations():
    user_id_str = request.args.get('user_id')

    if user_id_str is not None:
        try:
            user_id = int(user_id_str)

            # Lấy các đánh giá cao nhất
            average_rating = df_final.groupby('productId')['rating'].mean()
            rating_count = df_final.groupby('productId')['rating'].count()
            df_averages_counts = pd.DataFrame({'productId': average_rating.index, 'avg_rating': average_rating, 'rating_count': rating_count})
            top_ratings_list = top_n_products(df_averages_counts, 10, 2).to_dict(orient='records')

            # Lấy gợi ý sản phẩm
            recommendations = recommend_products(user_id)

            return jsonify({
                "user_id": user_id,
                "top_ratings": top_ratings_list,
                "recommendations": recommendations
            })

        except ValueError:
            return jsonify({"error": "Invalid User ID"}), 400
    else:
        # Nếu không có user_id, chỉ trả về các đánh giá cao nhất
        average_rating = df_final.groupby('productId')['rating'].mean()
        rating_count = df_final.groupby('productId')['rating'].count()
        df_averages_counts = pd.DataFrame({'productId': average_rating.index, 'avg_rating': average_rating, 'rating_count': rating_count})
        top_ratings_list = top_n_products(df_averages_counts, 10, 2).to_dict(orient='records')

        return jsonify({"top_ratings": top_ratings_list})

if __name__ == '__main__':
    app.run(debug=True)
