import React from "react";
import CheckBox from "../Utils/CheckBox";
import classes from "./SingleProducts.module.css";

const SingleProducts = ({ item, onChecked, onSubmit }) => {
  return (
    <div key={item.sku} className={classes.card}>
      <CheckBox item={item} onChecked={onChecked} onSubmit={onSubmit} />
      <div className={classes["card_item"]}>
        <h3>#{item.sku}</h3>
        <h3>{item.name}</h3>
        <h3>{item.price}.00$</h3>
        {item.type === "DVD" && <h3>Size: {item.attributes}</h3>}
        {item.type === "Book" && <h3> Weight:{item.attributes}</h3>}
        {item.type === "Furniture" && <h3>Dimenisions {item.attributes}</h3>}
      </div>
    </div>
  );
};

export default SingleProducts;
