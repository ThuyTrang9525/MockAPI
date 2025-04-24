import { data } from './data.js';
import React, { Component } from 'react';

class State1 extends Component {
    constructor(props) {
      super(props);
      this.state = {
        products: data // đưa dữ liệu vào state
      };
    }
  
    render() {
      return (
        <div>
          <h2>Danh sách sản phẩm </h2>
          {this.state.products.map((item) => (
            <div key={item.id} style={{ border: '1px solid #ccc', margin: '10px', padding: '10px' }}>
              <img src={item.imageUrl} alt={item.name} style={{ width: '150px' }} />
              <h3>{item.name}</h3>
              <p>Danh mục: {item.category}</p>
              <p>Giá: {item.price}</p>
            </div>
          ))}
        </div>
      );
    }
  }
  

export default State1;