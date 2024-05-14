import numpy as np
import pandas as pd
from flask import Flask, jsonify
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

# Sample data (replace this with your data)
sample_data = [
    {"id": 1, "name": "John"},
    {"id": 2, "name": "Jane"},
    {"id": 3, "name": "Doe"}
]

@app.route('/api/users', methods=['GET'])
def get_users():
    query = 'SELECT * FROM ratings'
    df = pd.read_sql(query, engine)
    new_column_names = [
        "id",
        "userId",
        "productId",
        "rating",
        "create_at",
        "orderId",
        "comment"
    ]
    df.columns = new_column_names

    ratings_count = df['userId'].value_counts().to_dict()

    RATINGS_CUTOFF = 2
    remove_users = [user for user, count in ratings_count.items() if count < RATINGS_CUTOFF]
    df = df[~df['userId'].isin(remove_users)]

    ratings_count_products = df['productId'].value_counts().to_dict()

    remove_products = [prod for prod, count in ratings_count_products.items() if count < RATINGS_CUTOFF]
    df_final = df[~df['productId'].isin(remove_products)]

    df_info = df.info()

    missing_values = df.isnull().sum().sum()

    df_final_description = df_final.describe().T

    rating_counts = df_final['rating'].value_counts()

        # Tạo DataFrame với thông tin tổng quan về dữ liệu
    df_uniques = pd.DataFrame(columns=['Total entries', 'Unique users', 'Unique products'])
    df_uniques.loc[0] = [len(df_final), df_final['userId'].nunique(), df_final['productId'].nunique()]

        # Top 10 người dùng có số lượng đánh giá cao nhất
    df_top10_users_ratings = df_final['userId'].value_counts().head(10).reset_index()
    df_top10_users_ratings.index = df_top10_users_ratings.index + 1
    df_top10_users_ratings.columns = ['userId', 'counts']

        # Tính trung bình đánh giá cho từng sản phẩm
    average_rating = df_final.groupby('productId')['rating'].mean()

        # Tính tổng số lượng đánh giá cho từng sản phẩm
    rating_count = df_final.groupby('productId')['rating'].count()

        # Tạo DataFrame với thông tin về trung bình và số lượng đánh giá
    df_averages_counts = pd.DataFrame({'productId': average_rating.index, 'avg_rating': average_rating, 'rating_count': rating_count})

        # Sắp xếp DataFrame theo trung bình đánh giá giảm dần
    final_rating = df_averages_counts.sort_values(by='avg_rating', ascending=False).head(5)

        # Hàm lấy ra top N sản phẩm
    def top_n_products(data, n, min_interactions=100):
        recommendations = data[data['rating_count'] >= min_interactions].sort_values(by='avg_rating', ascending=False)
        return recommendations.head(n)

        # Lấy top 10 sản phẩm với ít nhất 2 đánh giá
    top_10_50_products = top_n_products(df_averages_counts, 10, 2)
    top_ratings_list = top_10_50_products.to_dict(orient='records')

        # Chuyển đổi DataFrame thành JSON và trả về kết quả
    return jsonify(top_ratings_list)


if __name__ == '__main__':
    app.run(debug=True)

