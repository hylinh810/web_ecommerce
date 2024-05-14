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

# Load order and order_detail data from MySQL
query_order = 'SELECT * FROM orders'
order_data = pd.read_sql(query_order, engine)
new_column_names = [
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
order_data.columns = new_column_names

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

# Create DataFrames for order and order_detail
orders = pd.DataFrame(order_data)
order_details = pd.DataFrame(order_detail_data)

# Merge order and order_detail to get purchase history
purchase_history = pd.merge(orders, order_details, left_on='id', right_on='order_id', how='inner')[['user_id', 'product_id']]

# Create a user-item matrix (binary representation)
user_item_matrix = purchase_history.pivot_table(index='user_id', columns='product_id', aggfunc='size', fill_value=0)

# Calculate cosine similarity between users
user_similarity = cosine_similarity(user_item_matrix)

# Map actual user IDs to a range of integers
user_id_to_index = {user_id: index for index, user_id in enumerate(user_item_matrix.index)}

# Function to get similar users
def get_similar_users(user_id, threshold=0.5):
    if user_id not in user_id_to_index:
        return []

    user_index = user_id_to_index[user_id]
    similar_users = user_similarity[user_index]
    similar_users = [(i, score) for i, score in enumerate(similar_users) if i != user_index and score >= threshold]
    similar_users.sort(key=lambda x: x[1], reverse=True)
    return similar_users

# Function to recommend products based on similar users
def recommend_products(user_id, num_recommendations=10, threshold=0.5):
    similar_users = get_similar_users(user_id, threshold)

    user_purchases = set(purchase_history[purchase_history['user_id'] == user_id]['product_id'])

    recommendations = []
    for similar_user_index, similarity_score in similar_users:
        similar_user_id = user_item_matrix.index[similar_user_index]
        similar_user_purchases = set(purchase_history[purchase_history['user_id'] == similar_user_id]['product_id'])
        new_products = similar_user_purchases - user_purchases
        recommendations.extend(new_products)

        if len(recommendations) >= num_recommendations:
            break

    return recommendations[:num_recommendations]

# API endpoint for product recommendations
@app.route('/api/recommendations', methods=['GET'])
def get_recommendations():
    user_id_str = request.args.get('user_id')

    if user_id_str is None:
        return jsonify({"error": "User ID is required"}), 400

    try:
        user_id = int(user_id_str)
    except ValueError:
        return jsonify({"error": "Invalid User ID"}), 400

    recommendations = recommend_products(user_id)
    return jsonify({"user_id": user_id, "recommendations": recommendations})

if __name__ == '__main__':
    app.run(debug=True)
