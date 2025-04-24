import React from "react";

function Content({ products }) {
  return (
    <div id="content">
      {/* Sidebar Menu */}
      <div id="left-content">
        <h1>Category</h1>
        <ul className="drop">
          <li><a href="#">Menu item 1</a></li>
          <li><a href="#">Menu item 2</a></li>
          <li>
            <a href="#">Menu item 3</a>
            <ul className="drop">
              <li><a href="#">Menu item 3.1</a></li>
              <li><a href="#">Menu item 3.2</a></li>
              <li><a href="#">Menu item 3.3</a></li>
              <li>
                <a href="#">Menu item 3.4</a>
                <ul className="drop">
                  <li><a href="#">Menu item 3.4.1</a></li>
                  <li><a href="#">Menu item 3.4.2</a></li>
                  <li><a href="#">Menu item 3.4.3</a></li>
                  <li>
                    <a href="#">Menu item 3.4.4</a>
                    <ul className="drop">
                      <li><a href="#">Menu item 3.4.4.1</a></li>
                      <li><a href="#">Menu item 3.4.4.2</a></li>
                      <li><a href="#">Menu item 3.4.4.3</a></li>
                      <li>
                        <a href="#">Menu item 3.4.4.4</a>
                        <ul className="drop">
                          <li><a href="#">Menu item 3.4.4.4.1</a></li>
                          <li><a href="#">Menu item 3.4.4.4.2</a></li>
                          <li><a href="#">Menu item 3.4.4.4.3</a></li>
                          <li><a href="#">Menu item 3.4.4.4.4</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#">Menu item 4</a></li>
          <li><a href="#">Menu item 5</a></li>
          <li><a href="#">Menu item 6</a></li>
        </ul>
      </div>

      {/* Product Display */}
      <div id="right-content">
        <h2>Product :</h2>
        <div id="products">
          <div className="row">
            {products.map((product) => (
              <div className="product" key={product.id}>
                <div className="text">
                  <div className="p-name">
                    <a href="item.html">{product.name}</a>
                  </div>
                </div>
                <div className="p-img">
                  <img src={product.imageUrl} alt={product.name} width={200} height={200} />
                </div>
                <div className="text">
                  <div className="p-cat">{product.category}</div>
                  <div className="p-price">{product.price}</div>
                  <input type="button" className="button" name="add" defaultValue="Add to cart" />
                </div>
                <div className="clear" />
              </div>
            ))}
            <div style={{ clear: "both" }} />
          </div>
        </div>
      </div>

      <div style={{ clear: "both" }} />
    </div>
  );
}

export default Content;
