import React, { useState, useEffect } from "react";
// import AddProduct from "./AddProduct";
import classes from "./Products.module.css";
import { Link } from "react-router-dom";
// import list from "../data";
import axios from "axios";
import SingleProducts from "./SingleProducts";

const Products = () => {
  const [products, SetProducts] = useState([]);
  const [selected, setSelected] = useState([]);

  useEffect(() => {
    const loadProducts = async () => {
      const response = await axios.get(
        "https://richesmetelewawontest.000webhostapp.com/View.php"
      );
      const data = response.data;
      SetProducts(data);
    };
    loadProducts();
    return;
  }, []);

  // handle Delete functionality
  const formSubmitHandler = (e) => {
    e.preventDefault();

    const DeleteProducts = async () => {
      const response = await axios.post(
        "https://richesmetelewawontest.000webhostapp.com/Delete.php",
        {
          checkbox: selected,
        }
      );
      console.log(response);
      window.location.reload();
    };
    DeleteProducts();

    // console.log(selected);
  };

  // to handle checkbox function
  const checkBoxHandler = (e) => {
    if (e.target.checked) {
      selected.push(e.target.value);
      setSelected(selected);
    } else {
      selected.splice(selected.indexOf(e.target.value), 1);
      setSelected(selected);
    }
  };

  //
  const allProducts = products.map((item, i) => {
    return (
      <SingleProducts
        item={item}
        onChecked={checkBoxHandler}
        key={i}
        onSubmit={formSubmitHandler}
      />
    );
  });

  return (
    <div className={classes.container}>
      <div className={classes.title}>
        <h1> Product List</h1>
        <div className={classes["actions_button"]}>
          <Link to="/addproduct">
            <button className={classes["add_button"]}>ADD</button>
          </Link>
          <button className={classes["delete_button"]} form="delete_products">
            {" "}
            MASS DELETE
          </button>
        </div>
      </div>
      <hr />

      <div className={classes["product_lists"]}>{allProducts}</div>
    </div>
  );
};

export default Products;
