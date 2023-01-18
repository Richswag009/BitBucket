import React from "react";

const CheckBox = ({ item, onChecked, onSubmit }) => {
  return (
    <form id="delete_products" onSubmit={onSubmit}>
      <input
        type="checkbox"
        id="checkbox"
        name="checkbox"
        value={item.sku}
        onChange={onChecked}
        className="delete-checkbox"
      />
    </form>
  );
};

export default CheckBox;
