const AWS = require("aws-sdk");

const s3 = new AWS.S3({
  accessKeyId: process.env.DO_ACCESS_KEY_ID,
  secretAccessKey: process.env.DO_SECRET_ACCESS_KEY,
  region: process.env.AWS_REGION,
  endpoint: new AWS.Endpoint(process.env.DO_ENDPOINT),
});

// s3.upload(
//   {
//     Bucket: process.env.DO_BUCKET,
//     Key: "helo/test.txt",
//     Body: "Hello World",
//     ACL: "public-read",
//   },
//   (err, data) => {
//     if (err) {
//       console.log(err);
//     }
//     console.log(data);
//   }
// );

module.exports = {
  s3: s3,
};
