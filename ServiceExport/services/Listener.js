const amqp = require("amqplib");
const { Parser } = require("json2csv");
const { s3Upload } = require("../utils/S3");

const ExportsService = require("../services/ExportsService");
const validatePayload = require("../utils/validatePayload");
const { sendEmail, sendEmailHTML } = require("./SendEmail");
const exportsService = new ExportsService();

const listen = async () => {
  try {
    const connection = await amqp.connect(process.env.RABBITMQ_URL);
    const channel = await connection.createChannel();
    await channel.assertQueue("export");
    channel.prefetch(1);
    channel.consume("export", async (message) => {
      try {
        const data = JSON.parse(message.content.toString());
        validatePayload(data);

        if (data.type === "orders") {
          console.log("Exporting orders");
          await exportsService.ExportOrders().then(async (result) => {
            const fields = Object.keys(result[0]);
            const parser = new Parser({ fields });
            const csv = parser.parse(result);

            const file = await s3Upload(csv, `orders ${new Date()}.csv`);
            sendEmail(
              data.email,
              "Orders Export",
              `Your orders export is ready. Download it here: ${file.Location}`
            );
            channel.ack(message);
          });
        } else if (data.type === "order_items") {
          console.log("Exporting order items");
          await exportsService.ExportOrderItems().then(async (result) => {
            const fields = Object.keys(result[0]);
            const parser = new Parser({ fields });
            const csv = parser.parse(result);

            const file = await s3Upload(csv, `order_items ${new Date()}.csv`);
            sendEmail(
              data.email,
              "Order Items Export",
              `Your order items export is ready. Download it here: ${file.Location}`
            );

            channel.ack(message);
          });
        } else if (data.type === "products") {
          console.log("Exporting products");
          console.log(data);
          await exportsService
            .ExportProducts(data.store_id)
            .then(async (result) => {
              const fields = Object.keys(result[0]);
              const parser = new Parser({ fields });
              const csv = parser.parse(result);

              const file = await s3Upload(csv, `products ${new Date()}.csv`);
              sendEmail(
                data.email,
                "Products Export",
                `Your products export is ready. Download it here: ${file.Location}`
              );

              channel.ack(message);
            });
        } else if (data.type === "invoice") {
          console.log("Exporting invoice");
          await exportsService
            .ExportInvoices(data.order_id)
            .then(async (result) => {

              const html = `
                <h1>Invoice</h1>
                <p>Order ID: ${result.order_id}</p>
                <p>Payment Method: ${result.payment_method}</p>
                <p>Shipment Method: ${result.shipment_method}</p>
                <p>Total Price: ${result.total_price}</p>
                <p>Status: ${result.status}</p>
                <p>Delivery Code: ${result.delivery_code}</p>
                <table>
                 <thead>
                  <tr>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  </tr>
                  </thead>
                  <tbody>
                  ${result.order_items.map(
                    (item) => `
                    <tr>
                    <td>${item.product_name}</td>
                    <td>${item.product_price}</td>
                    <td>${item.quantity}</td>
                    <td>${item.price}</td>
                    </tr>
                    `
                  )}
                  </tbody>
                </table>
                `;

              sendEmailHTML(data.email, "Invoice", html);
              channel.ack(message);
            });
        }
      } catch (error) {
        console.log(error);
        channel.nack(message, false, false);
      }
    });
  } catch (error) {
    console.log(error);
  }
};

module.exports = {
  listen: listen,
};
