import React, { useEffect, useState } from "react";
import axios from "axios";
// import ProductItem from "./ProductItem";
// import ProductForm from "./ProductForm";

// function ProductList() {
//   const [products, setProducts] = useState([]);
//   const [selected, setSelected] = useState(null);

//   const fetchProducts = async () => {
//     const res = await axios.get("https://656ca88ee1e03bfd572e9c16.mockapi.io/products");
//     setProducts(res.data);
//   };

//   useEffect(() => {
//     fetchProducts();
//   }, []);

//   const handleDelete = async (id) => {
//     await axios.delete(`https://656ca88ee1e03bfd572e9c16.mockapi.io/products/${id}`);
//     fetchProducts();
//   };

//   const handleEdit = (product) => {
//     setSelected(product);
//   };

//   return (
//     <div>
//       <h2>Product Manager</h2>
//       <ProductForm selected={selected} onSuccess={fetchProducts} />
//       <div style={{ display: "flex", flexWrap: "wrap", gap: "1rem" }}>
//         {products.map((item) => (
//           <ProductItem key={item.id} product={item} onDelete={handleDelete} onEdit={handleEdit} />
//         ))}
//       </div>
//     </div>
//   );
// }


const ProductList = () => {
  const [products, setProducts] = useState([]);

  useEffect(() => {
    axios.get("http://127.0.0.1:8000/api/products")
      .then((res) => setProducts(res.data))
      .catch((err) => console.error("API error:", err));
  }, []);

  // 👉 Lọc sản phẩm có khuyến mãi
  const discountedProducts = products.filter(p => p.promotion_price > 0);

  // 👉 Tính tổng giá gốc tất cả sản phẩm
  const totalUnitPrice = products.reduce((sum, p) => sum + p.unit_price, 0);

  return (
    <div className="p-8 bg-gray-50 min-h-screen">
      <h2 className="text-3xl font-bold mb-4 text-center">Danh sách sản phẩm</h2>

      {/* Tổng giá trị */}
      <p className="text-center text-gray-700 mb-6">
        Tổng giá gốc: <span className="font-semibold">{totalUnitPrice.toLocaleString()}đ</span>
      </p>

      <div className="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        {discountedProducts.map(product => (
          <div key={product.id} className="bg-white shadow-lg rounded-xl overflow-hidden hover:scale-105 transition transform duration-300">
            <img
              src={`http://127.0.0.1:8000/images/products/${product.image}`}
              alt={product.name}
              className="h-48 w-full object-cover"
            />
            <div className="p-4">
              <h3 className="text-xl font-semibold">{product.name}</h3>
              <p className="text-gray-600 text-sm mt-1">{product.description}</p>
              <div className="mt-3 flex items-center space-x-2">
                <span className="text-red-600 font-bold">{product.promotion_price.toLocaleString()}đ</span>
                <span className="line-through text-gray-400 text-sm">{product.unit_price.toLocaleString()}đ</span>
                <span className="text-sm text-gray-500">/ {product.unit}</span>
              </div>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
};

export default ProductList;

