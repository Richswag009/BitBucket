import React, { useState, useEffect } from "react";
import classes from "./Products.module.css";
import { Link } from "react-router-dom";
import axios from "axios";
import SingleProducts from "./SingleProducts";

const Products = () => {
  const [products, SetProducts] = useState([]);
  const [selected, setSelected] = useState([]);

  useEffect(() => {
    const loadProducts = async () => {
      const response = await axios.get(
        // "http://Localhost/Project/Backend/API/View.php"
        "https://richesmetelewawontest.000webhostapp.com/View.php"
      );
      const data = response.data;
      SetProducts(data);
    };
    loadProducts();
  }, []);

  // delete products function
  const deleteProducts = async () => {
    await axios.post(
      // "http://Localhost/Project/Backend/API/Delete.php",
      "https://richesmetelewawontest.000webhostapp.com/Delete.php",
      {
        checkbox: selected,
      }
    );
  };

  // handle Delete functionality
  const formSubmitHandler = (e) => {
    e.preventDefault();
    deleteProducts();
    window.location.reload();
  };

  // to handle checkbox function
  const checkBoxHandler = (e) => {
    if (e.target.checked) {
      selected.push(e.target.value);
      setSelected(selected);
      console.log(selected);
    } else {
      selected.splice(selected.indexOf(e.target.value), 1);
      setSelected(selected);
      console.log(selected);
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
          <button
            className={classes["delete_button"]}
            form="delete_products"
            id="delete-product-btn"
          >
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
