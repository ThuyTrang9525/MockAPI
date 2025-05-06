import React, { Component } from "react";
import { data } from "./data";

class Formmenu extends Component {
  constructor(props) {
    super(props);
    this.state = {
      name: "",
      myfile: "",
      type: "",
      price: "",
      list: data,
      editingId: null, 
    };
  }

  myChangeHandler = (event) => {
    const { name, value } = event.target;
    this.setState({ [name]: value });
  };

  mySubmitHandler = (event) => {
    event.preventDefault();
    const { editingId, list, name, myfile, type, price } = this.state;

    if (editingId !== null) {
      // Nếu đang sửa
      const updatedList = list.map((item) =>
        item.id === editingId
          ? { ...item, name, myfile, type, price: parseFloat(price) }
          : item
      );
      this.setState({
        list: updatedList,
        name: "",
        myfile: "",
        type: "",
        price: "",
        editingId: null,
      });
    } else {
      // Nếu đang thêm mới
      const newItem = {
        id: (list.length ? Math.max(...list.map((item) => parseInt(item.id))) + 1 : 1).toString(),
        name: name,
        myfile: myfile,
        type: type,
        price: parseFloat(price),
      };
      this.setState({
        list: [...list, newItem],
        name: "",
        myfile: "",
        type: "",
        price: "",
      });
    }
  };

  handleEdit = (item) => {
    this.setState({
      name: item.name,
      myfile: item.myfile,
      type: item.type,
      price: item.price,
      editingId: item.id,
    });
  };

  handleDelete = (id) => {
    const confirmDelete = window.confirm("Bạn có chắc muốn xóa món này?");
    if (confirmDelete) {
      const newList = this.state.list.filter((item) => item.id !== id);
      this.setState({ list: newList });
    }
  };
  render() {
    return (
      <div className="container mt-4">
        <h2 className="text-center mb-4">
          {this.state.editingId ? "Chỉnh sửa món" : "Thêm món mới vào Menu"}
        </h2>

        <form onSubmit={this.mySubmitHandler}>
          <div className="row">
            <div className="col-md-6 mb-3">
              <label className="form-label">Tên món</label>
              <input
                className="form-control"
                type="text"
                name="name"
                value={this.state.name}
                onChange={this.myChangeHandler}
                required
              />
            </div>

            <div className="col-md-6 mb-3">
              <label className="form-label">Link hình ảnh</label>
              <input
                className="form-control"
                type="text"
                name="myfile"
                value={this.state.myfile}
                onChange={this.myChangeHandler}
                placeholder="Nhập link ảnh món"
                required
              />
            </div>

            <div className="col-md-6 mb-3">
              <label className="form-label">Loại món</label>
              <input
                className="form-control"
                type="text"
                name="type"
                value={this.state.type}
                onChange={this.myChangeHandler}
                required
              />
            </div>

            <div className="col-md-6 mb-3">
              <label className="form-label">Giá tiền</label>
              <input
                className="form-control"
                type="number"
                name="price"
                value={this.state.price}
                onChange={this.myChangeHandler}
                required
              />
            </div>

            <div className="col-12 text-center">
              <button type="submit" className="btn btn-success px-5">
                {this.state.editingId ? "Cập nhật" : "Thêm Món"}
              </button>
            </div>
          </div>
        </form>

        <hr />

        <h2 className="text-center mb-4">Menu Katinat</h2>
        <div className="row">
          {this.state.list.map((item) => (
            <div key={item.id} className="col-md-4 mb-4">
              <div className="card h-100 shadow-sm position-relative">
                <img
                  src={item.myfile}
                  className="card-img-top"
                  alt={item.name}
                  style={{ height: "220px", objectFit: "cover" }}
                />
                <div
                  className="position-absolute top-0 end-0 p-2"
                  style={{ display: "flex", gap: "5px" }}
                >
                  <button
                    className="btn btn-warning btn-sm"
                    onClick={() => this.handleEdit(item)}
                  >
                    Sửa
                  </button>
                  <button
                    className="btn btn-danger btn-sm"
                    onClick={() => this.handleDelete(item.id)}
                  >
                    Xóa
                  </button>
                </div>
                <div className="card-body text-center">
                  <h5 className="card-title">{item.name}</h5>
                  <p className="card-text text-muted">{item.type}</p>
                  <p className="card-text fw-bold" style={{ fontSize: "18px" }}>
                    {item.price.toLocaleString()} đ
                  </p>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    );
  }
  
  componentDidMount() {
    const savedList = localStorage.getItem('menuList');
    if (savedList) {
      this.setState({ list: JSON.parse(savedList) });
    }
  }
  componentDidUpdate(prevProps, prevState) {
    if (prevState.list !== this.state.list) {
      localStorage.setItem('menuList', JSON.stringify(this.state.list));
    }
  }
  
}

export default Formmenu;
