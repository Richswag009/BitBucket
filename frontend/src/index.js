import React from "react";
import ReactDOM from "react-dom/client";
import "./index.css";
import App from "./App";
// import reportWebVitals from './reportWebVitals';
// import { createBrowserRouter } from "react-router-dom";

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(
  <React.StrictMode>
    {/* <createBrowserRouter> */}
      <App />
    {/* </createBrowserRouter> */}
  </React.StrictMode>
);