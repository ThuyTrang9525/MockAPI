import React, { useEffect, useState } from "react";
import axios from "axios";
import ProductItem from "./ProductItem";
import ProductForm from "./ProductForm";

function ProductList() {
  const [products, setProducts] = useState([]);
  const [selected, setSelected] = useState(null);

  const fetchProducts = async () => {
    const res = await axios.get("https://656ca88ee1e03bfd572e9c16.mockapi.io/products");
    setProducts(res.data);
  };

  useEffect(() => {
    fetchProducts();
  }, []);

  const handleDelete = async (id) => {
    await axios.delete(`https://656ca88ee1e03bfd572e9c16.mockapi.io/products/${id}`);
    fetchProducts();
  };

  const handleEdit = (product) => {
    setSelected(product);
  };

  return (
    <div>
      <h2>Product Manager</h2>
      <ProductForm selected={selected} onSuccess={fetchProducts} />
      <div style={{ display: "flex", flexWrap: "wrap", gap: "1rem" }}>
        {products.map((item) => (
          <ProductItem key={item.id} product={item} onDelete={handleDelete} onEdit={handleEdit} />
        ))}
      </div>
    </div>
  );
}

export default ProductList;
