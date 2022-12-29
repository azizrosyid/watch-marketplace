const ProductService = require("../../services/ProductService");
const productService = new ProductService();
const { s3 } = require("../../utils/S3");
module.exports = {
  getAllProducts: async (req, res) => {
    const result = await productService.getAllProducts();
    res.json({
      status: "success",
      message: "Products retrieved successfully",
      data: result,
    });
  },
  getProductById: async (req, res) => {
    const id = req.params.id;
    const result = await productService.getProductById(id);
    if (result.length) {
      res.json({
        status: "success",
        message: "Product retrieved successfully",
        data: result[0],
      });
    } else {
      res.json({
        status: "error",
        message: "Product not found",
        data: null,
      });
    }
  },
  createProduct: async (req, res) => {
    const fileContent = Buffer.from(req.files.image.data, "binary");
    const slug = req.body.name.toLowerCase().replace(/ /g, "-");
    const fileExtension = req.files.image.name.split(".").pop();
    const params = {
      Bucket: process.env.DO_BUCKET,
      Key: `products/${new Date().getTime()}-${slug}.${fileExtension}`,
      Body: fileContent,
      ACL: "public-read",
    };
    let dataImage = await s3.upload(params).promise();

    const data = {
      name: req.body.name,
      slug,
      description: req.body.description,
      stock: req.body.stock,
      price: req.body.price,
      image: dataImage.Location,
      store_id: req.body.store_id,
      category_id: req.body.category_id,
      created_at: new Date(),
      updated_at: new Date(),
    };
    const result = await productService.createProduct(data);
    res.json({
      status: "success",
      message: "Product added successfully",
      data: result,
    });
  },
  deleteProduct: async (req, res) => {
    const id = req.params.id;
    const result = await productService.deleteProduct(id);
    if (result) {
      return res.json({
        status: "success",
        message: "Product deleted successfully",
      });
    }
    return res.json({
      status: "error",
      message: "Product not found",
    });
  },

  getBrands: async (req, res) => {
    const result = await productService.getBrands();
    res.json({
      status: "success",
      message: "Brands retrieved successfully",
      data: result,
    });
  },

  getCategories: async (req, res) => {
    const result = await productService.getCategories();
    res.json({
      status: "success",
      message: "Categories retrieved successfully",
      data: result,
    });
  },
};
