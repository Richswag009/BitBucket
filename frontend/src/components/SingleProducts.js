import React from "react";
import CheckBox from "../Utils/CheckBox";
import classes from "./SingleProducts.module.css";

const SingleProducts = ({ item, onChecked, onSubmit }) => {
  return (
    <div key={item.sku} className={classes.card}>
      <CheckBox item={item} onChecked={onChecked} onSubmit={onSubmit} />
      <div className={classes["card_item"]}>
        <h5>#{item.sku}</h5>
        <h3>{item.name}</h3>
        <h3>{item.price}.00$</h3>
        {item.type === "DVD" && <h5>Size: {item.attributes}</h5>}
        {item.type === "Book" && <h5> Weight:{item.attributes}</h5>}
        {item.type === "Furniture" && <h5>Dimenisions {item.attributes}</h5>}
      </div>
    </div>
  );
};

export default SingleProducts;
