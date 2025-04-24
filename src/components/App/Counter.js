import React, { Component } from 'react';

class Counter extends Component {
    constructor(props) {
        super(props);
        this.state = {
            count: 0
        };
    }
    increment = () => {
        this.setState((p) => ({ count: this.state.count + 1 }));
    }
    decrement = () => {
        this.setState((p) => ({ count: this.state.count - 1 }));
    }
    reset = () => {
        this.setState((p) => ({ count: 0 }));
    }
    render() {
        return (
            <div>
                <h5>Giá trị: {this.state.count}</h5>
                <button onClick={this.increment}>Tăng</button>
                <button onClick={this.decrement}>Giảm</button>
                <button onClick={this.reset}>Đặt lại</button>
            </div>
        );
    }
}

export default Counter;