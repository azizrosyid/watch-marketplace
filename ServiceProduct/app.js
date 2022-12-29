require("dotenv").config();
const express = require("express");
const path = require("path");
const cookieParser = require("cookie-parser");
const logger = require("morgan");
const fileUpload = require("express-fileupload");
const cors = require("cors");

const app = express();

const productRoute = require("./app/Product/route");
app.use(
  fileUpload({
    limits: { fileSize: 1 * 1024 * 1024 },
  })
);
app.use(cors());

app.use(logger("dev"));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, "public")));

app.use("/product", productRoute);

module.exports = app;
