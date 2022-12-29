const express = require("express");
const router = express.Router();

const productHandler = require("./handler");

router.get("/", productHandler.getAllProducts);
router.get("/brands", productHandler.getBrands);
router.get("/categories", productHandler.getCategories);
router.get("/:id", productHandler.getProductById);
router.post("/", productHandler.createProduct);
router.delete("/:id", productHandler.deleteProduct);

module.exports = router;
