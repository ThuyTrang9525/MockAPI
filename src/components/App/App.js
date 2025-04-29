import React, { Component } from "react";
import { BrowserRouter as Router, Routes, Route, Link } from "react-router-dom";
import "./App.css";
import "./styleshop.css";
import Item from "./Item";
import Header from "../Header/header";
import Footer from "../Footer/footer";
import Content from "../Content/Content";
import Contact from "../../practice/contact";
import TodoList from "../TodoList";
import Arr from "../../practice/arr";
import Game from "../../practice/game";
import { data } from "./data";
import Counter from "./Counter";
import Dientich_hcn  from "./Dientich_hcn";
import State1 from "./State1";
import ProductList from "../ProductList";
import { useState, useEffect } from 'react';


// class App extends Component {
 
//   render() {
//     return (
//       <div id="container">
//       <ProductList/>
//       </div>
      
        
//     );
//   }
// }

// export default App;
// function App() {
//   const products = data;

//   return (
//     <div id="container">
//       <Header />
//       {/* Content Area */}
//       <Content products={products} />
//       {/* Footer */}
//       <Footer />
//     </div>
//   );
// }
// import ProductList from "../ProductList";
// function App() {
//   return (
//     <div className="App">
//       <ProductList />
//     </div>
//   );
// }
// export default App;

// export default function App() {
//   // 1. State cho inputs và danh sách sản phẩm
//   const [inputs, setInputs] = useState({ name: '', price: '', image: '' });
//   const [products, setProducts] = useState([]);

//   // 2. Load danh sách từ sessionStorage khi component mount
//   useEffect(() => {
//     const saved = sessionStorage.getItem('products');
//     if (saved) {
//       setProducts(JSON.parse(saved));
//     }
//   }, []);

//   // 3. Cập nhật inputs khi user nhập
//   const handleChange = (e) => {
//     const { name, value } = e.target;
//     setInputs(prev => ({ ...prev, [name]: value }));
//   };

//   // 4. Xử lý submit: thêm sản phẩm, lưu sessionStorage, reset form
//   const handleSubmit = (e) => {
//     e.preventDefault();
//     const updated = [...products, inputs];
//     setProducts(updated);
//     sessionStorage.setItem('products', JSON.stringify(updated));
//     setInputs({ name: '', price: '', image: '' });
//   };

//   return (
//     <div className="container">
//       <h2>Thêm sản phẩm</h2>
//       <form onSubmit={handleSubmit}>
//         <div className="form-group">
//           <label htmlFor="name">Tên sản phẩm:</label>
//           <input
//             type="text"
//             id="name"
//             name="name"
//             value={inputs.name}
//             onChange={handleChange}
//             required
//           />
//         </div>

//         <div className="form-group">
//           <label htmlFor="price">Giá (VND):</label>
//           <input
//             type="number"
//             id="price"
//             name="price"
//             value={inputs.price}
//             onChange={handleChange}
//             required
//           />
//         </div>

//         <div className="form-group">
//           <label htmlFor="image">Ảnh (URL):</label>
//           <input
//             type="url"
//             id="image"
//             name="image"
//             value={inputs.image}
//             onChange={handleChange}
//             required
//           />
//         </div>

//         <button type="submit">Thêm</button>
//       </form>

//       <h2>Danh sách sản phẩm đã nhập</h2>
//       {products.length === 0 ? (
//         <p>Chưa có sản phẩm nào.</p>
//       ) : (
//         <ul className="product-list">
//           {products.map((p, i) => (
//             <li className="product-card" key={i}>
//               <img
//                 className="product-image"
//                 src={p.image}
//                 alt={p.name}
//                 onError={e => { e.target.src = 'https://via.placeholder.com/180'; }}
//               />
//               <div className="product-info">
//                 <strong>{p.name}</strong>
//                 <span>{p.price} VND</span>
//               </div>
//             </li>
//           ))}
//         </ul>
//       )}
//     </div>
//   );
// }



export default function CafeMenu() {
  const [inputs, setInputs] = useState({ name: '', price: '', image: '' });
  const [products, setProducts] = useState([]);
  const [editIndex, setEditIndex] = useState(-1); // -1 nghĩa là không đang sửa món nào

  // Load danh sách từ sessionStorage khi component mount
  useEffect(() => {
    const saved = sessionStorage.getItem('products');
    if (saved) {
      setProducts(JSON.parse(saved));
    }
  }, []);

  // Cập nhật inputs khi user nhập
  const handleChange = (e) => {
    const { name, value } = e.target;
    setInputs(prev => ({ ...prev, [name]: value }));
  };

  // Thêm hoặc cập nhật món
  const handleSubmit = (e) => {
    e.preventDefault();
    if (editIndex === -1) {
      // Thêm mới
      const updated = [...products, inputs];
      setProducts(updated);
      sessionStorage.setItem('products', JSON.stringify(updated));
    } else {
      // Cập nhật món đang chỉnh sửa
      const updated = [...products];
      updated[editIndex] = inputs;
      setProducts(updated);
      sessionStorage.setItem('products', JSON.stringify(updated));
      setEditIndex(-1); // reset chế độ sửa
    }
    setInputs({ name: '', price: '', image: '' });
  };

  // Xóa món
  const handleDelete = (index) => {
    if (window.confirm('Bạn có chắc chắn muốn xóa món này?')) {
      const updated = products.filter((_, i) => i !== index);
      setProducts(updated);
      sessionStorage.setItem('products', JSON.stringify(updated));
    }
  };

  // Bắt đầu sửa món
  const handleEdit = (index) => {
    setEditIndex(index);
    setInputs(products[index]);
  };

  return (
    <div className="container">
      <h2>Menu Quán Cafe</h2>
      <form onSubmit={handleSubmit}>
        <div className="form-group">
          <label htmlFor="name">Tên món:</label>
          <input
            type="text"
            id="name"
            name="name"
            value={inputs.name}
            onChange={handleChange}
            required
          />
        </div>

        <div className="form-group">
          <label htmlFor="price">Giá (VND):</label>
          <input
            type="number"
            id="price"
            name="price"
            value={inputs.price}
            onChange={handleChange}
            required
          />
        </div>

        <div className="form-group">
          <label htmlFor="image">Ảnh món (URL):</label>
          <input
            type="url"
            id="image"
            name="image"
            value={inputs.image}
            onChange={handleChange}
            required
          />
        </div>

        <button type="submit">{editIndex === -1 ? 'Thêm món' : 'Cập nhật món'}</button>
      </form>

      <h2>Danh sách món</h2>
      {products.length === 0 ? (
        <p>Chưa có món nào trong menu.</p>
      ) : (
        <ul className="product-list">
          {products.map((p, i) => (
            <li className="product-card" key={i}>
              <img
                className="product-image"
                src={p.image}
                alt={p.name}
                onError={e => { e.target.src = 'https://via.placeholder.com/180'; }}
              />
              <div className="product-info">
                <strong>{p.name}</strong>
                <span>{parseInt(p.price).toLocaleString()} VND</span>
              </div>
              <div className="product-actions">
                <button onClick={() => handleEdit(i)}>Sửa</button>
                <button onClick={() => handleDelete(i)}>Xóa</button>
              </div>
            </li>
          ))}
        </ul>
      )}
    </div>
  );
}
