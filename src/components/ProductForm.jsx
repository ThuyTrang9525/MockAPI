import React, { useState, useEffect } from "react";
import axios from "axios";

function ProductForm({ selected, onSuccess }) {
  const [formData, setFormData] = useState({
    name: "",
    price: "",
    quantity: "",
    description: "",
    avatar: ""
  });

  useEffect(() => {
    if (selected) setFormData(selected);
  }, [selected]);

  const handleChange = (e) => {
    setFormData((prev) => ({
      ...prev,
      [e.target.name]: e.target.value
    }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    if (formData.id) {
      await axios.put(`https://656ca88ee1e03bfd572e9c16.mockapi.io/products/${formData.id}`, formData);
    } else {
      await axios.post("https://656ca88ee1e03bfd572e9c16.mockapi.io/products", formData);
    }
    onSuccess();
    setFormData({ name: "", price: "", quantity: "", description: "", avatar: "" });
  };

  return (
    <form onSubmit={handleSubmit}>
      <input name="name" placeholder="Name" value={formData.name} onChange={handleChange} />
      <input name="price" placeholder="Price" value={formData.price} onChange={handleChange} />
      <input name="quantity" placeholder="Quantity" value={formData.quantity} onChange={handleChange} />
      <input name="description" placeholder="Description" value={formData.description} onChange={handleChange} />
      <input name="avatar" placeholder="Image URL" value={formData.avatar} onChange={handleChange} />
      <button type="submit">{formData.id ? "Update" : "Add"} Product</button>
    </form>
  );
}

export default ProductForm;
