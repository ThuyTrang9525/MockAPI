// import React, { useState } from 'react';
import React, { Component } from "react";

// export function Dientich_hcn() {
//     const [length, setLength] = useState(0);
//     const [width, setWidth] = useState(0);
//     const [area, setArea] = useState(0);

//     const calculateArea = () => {
//         setArea(length * width);
//     };

//     return (
//         <div>
//             <p>Tính diện tích hình chữ nhật</p>

//             <div>
//                 <label>Chiều dài:</label>
//                 <input
//                     type="number"
//                     value={length}
//                     onChange={(e) => setLength(Number(e.target.value))}
//                 />
//             </div>
//             <div>
//                 <label>Chiều rộng:</label>
//                 <input
//                     type="number"
//                     value={width}
//                     onChange={(e) => setWidth(Number(e.target.value))}
//                 />
//             </div>
//             <button onClick={calculateArea}>Tính diện tích</button>
//             <div>
//                 <p>Diện tích hình chữ nhật là: {area}</p>
//             </div>
//         </div>
//     );
// }

 class Dientich_hcn extends Component {
  constructor(props) {
    super(props);
    this.state = {
      length: 0,
      width: 0,
      area: 0
    };
  }

  handleLengthChange = (event) => {
    this.setState({ length: Number(event.target.value) });
  };

  handleWidthChange = (event) => {
    this.setState({ width: Number(event.target.value) });
  };

  calculateArea = () => {
    const { length, width } = this.state;
    const area = length * width;
    this.setState({ area });
  };

  render() {
    return (
      <div>
        <h2>Tính diện tích hình chữ nhật</h2>
        <div>
          <label>Chiều dài:</label>
          <input
            type="number"
            value={this.state.length}
            onChange={this.handleLengthChange}
          />
        </div>
        <div>
          <label>Chiều rộng:</label>
          <input
            type="number"
            value={this.state.width}
            onChange={this.handleWidthChange}
          />
        </div>
        <button onClick={this.calculateArea}>Tính diện tích</button>
        <div>
          <p>Diện tích hình chữ nhật là: {this.state.area}</p>
        </div>
      </div>
    );
  }
}
export default Dientich_hcn;