const AWS = require("aws-sdk");

const s3 = new AWS.S3({
  accessKeyId: process.env.DO_ACCESS_KEY_ID,
  secretAccessKey: process.env.DO_SECRET_ACCESS_KEY,
  region: process.env.AWS_REGION,
  endpoint: new AWS.Endpoint(process.env.DO_ENDPOINT),
});

const s3Upload = async (file, key) => {
  return s3
    .upload({
      Bucket: process.env.DO_BUCKET,
      Key: key,
      Body: file,
      ACL: "public-read",
    })
    .promise();
};

module.exports = {
  s3: s3,
  s3Upload: s3Upload,
};
