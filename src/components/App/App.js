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

class App extends Component {
 
  render() {
    return (
      <div id="container">
      <ProductList/>
      </div>
      
        
    );
  }
}

export default App;
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
