import React from "react";

function ProductItem({ product, onDelete, onEdit }) {
  return (
    <div style={{ border: "1px solid #ccc", padding: "1rem", width: "250px" }}>
      <img src={product.avatar || "https://via.placeholder.com/150"} alt={product.name} width="100%" />
      <h3>{product.name}</h3>
      <p>{product.description}</p>
      <p>💰 {product.price} - 📦 {product.quantity}</p>
      <button onClick={() => onEdit(product)}>Edit</button>
      <button onClick={() => onDelete(product.id)}>Delete</button>
    </div>
  );
}

export default ProductItem;
