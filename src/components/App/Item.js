import React from "react";
function Item(props) {
  return (
    <div className="col-6 col-md-3 mb-4">
      <div className="border p-3 text-center">
        <img
          src={props.imageUrl}
          width={200}
          alt="Item Name"
          className="img-fluid mb-2"
        />
        <h3 className="h5">{props.title}</h3>
        <p>{props.cost}</p>
        <button className="btn btn-primary">Add to cart</button>
      </div>
    </div>
  );
}

// function Item(props) {
//   const { height, width, backgroundColor } = props;

//   return (
//     <div 
//       className="col-6 col-md-3 mb-4" 
//       style={{ height: height, width: width, backgroundColor: backgroundColor }}
//     >
//     </div>
//   );
// }

export default Item;