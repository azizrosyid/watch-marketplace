const { pool } = require("../utils/poolDB");

class ExportsService {
  async ExportOrders() {
    const result = await pool.query(
      "SELECT orders.id as id, payment_method,shipment_method, total_price, status, delivery_code, stores.name as store_name  FROM orders INNER JOIN stores ON orders.store_id = stores.id"
    );
    return result[0];
  }

  async ExportOrderItems() {
    const result = await pool.query(
      "SELECT order_items.id,quantity, order_items.price as total_price, products.name as product_name, products.price as product_price FROM order_items INNER JOIN products ON order_items.product_id = products.id"
    );
    return result[0];
  }

  async ExportProducts(store_id = null) {
    let query =
      "SELECT products.id, products.name, stock, price, stores.name as store_name,categories.name as category FROM products INNER JOIN stores ON products.store_id = stores.id INNER JOIN categories ON products.category_id = categories.id";
    if (store_id) {
      query += ` WHERE products.store_id = ${store_id}`;
    }
    const result = await pool.query(query);
    return result[0];
  }

  async ExportInvoices(order_id) {
    const result = await pool.query(
      "SELECT * FROM orders INNER JOIN order_items ON orders.id = order_items.order_id INNER JOIN products ON order_items.product_id = products.id WHERE orders.id = ?",
      [order_id]
    );

    const invoice = {
      order_id: result[0][0].order_id,
      payment_method: result[0][0].payment_method,
      shipment_method: result[0][0].shipment_method,
      total_price: result[0][0].total_price,
      status: result[0][0].status,
      delivery_code: result[0][0].delivery_code,
      order_items: result[0].map((item) => {
        return {
          id: item.id,
          quantity: item.quantity,
          price: item.price,
          product_name: item.name,
          product_price: item.price,
        };
      }),
    };

    return invoice;
  }
}

module.exports = ExportsService;
