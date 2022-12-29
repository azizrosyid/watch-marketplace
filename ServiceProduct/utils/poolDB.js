const mysql = require("mysql2");
const pool = mysql.createPool({
  connectionLimit: 10,
  host: process.env.MYSQL_HOST,
  port: process.env.MYSQL_PORT,
  user: process.env.MYSQL_USER,
  password: process.env.MYSQL_PASS,
  database: process.env.MYSQL_DB,
});

module.exports = {
  pool: pool.promise(),
};
