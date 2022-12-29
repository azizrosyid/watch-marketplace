const { pool } = require("../utils/poolDB");

class ProductService {
  async getStore() {
    const result = await pool.query("SELECT id, name, address FROM stores");
    const map = {};
    result[0].forEach((store) => {
      map[store.id] = {
        id: store.id,
        name: store.name,
        address: store.address,
      };
    });
    return map;
  }

  async getCategory() {
    const result = await pool.query("SELECT id, name FROM categories");
    const map = {};
    result[0].forEach((category) => {
      map[category.id] = {
        id: category.id,
        name: category.name,
      };
    });
    return map;
  }

  async getAllProducts() {
    const result = await pool.query(
      "SELECT id, name, stock, price, image, store_id, category_id, created_at, updated_at FROM products"
    );

    const storeMap = await this.getStore();
    const categoryMap = await this.getCategory();
    result[0].forEach((product) => {
      product.store = storeMap[product.store_id];
      product.category = categoryMap[product.category_id];
    });
    return result[0];
  }

  async getProductById(id) {
    const result = await pool.query("SELECT * FROM products WHERE id = ?", [
      id,
    ]);
    return result[0];
  }

  async createProduct(data) {
    const result = await pool.query(
      "INSERT INTO products (name, slug, description, stock, price, image, store_id, category_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
      [
        data.name,
        data.slug,
        data.description,
        data.stock,
        data.price,
        data.image,
        data.store_id,
        data.category_id,
        data.created_at,
        data.updated_at,
      ]
    );

    if (result[0].affectedRows) {
      return {
        id: result[0].insertId,
      };
    }
    return null;
  }

  async deleteProduct(id) {
    const result = await pool.query("DELETE FROM products WHERE id = ?", [id]);
    console.log(result[0]);
    if (result[0].affectedRows) {
      return true;
    }
    return false;
  }

  async getBrands() {
    const result = await pool.query("SELECT id, name FROM stores");
    return result[0];
  }

  async getCategories() {
    const result = await pool.query("SELECT id, name FROM categories");
    return result[0];
  }
}

module.exports = ProductService;
