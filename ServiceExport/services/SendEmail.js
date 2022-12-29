const nodemailer = require("nodemailer");
const transporter = nodemailer.createTransport({
  host: "smtp.gmail.com",
  port: 465,
  secure: true,
  auth: {
    user: "testing.repo.it@gmail.com",
    pass: "dbcmgpwkbgtsvvce",
  },
});

function sendEmail(to, subject, text) {
  const message = {
    from: "azizrosyid783@gmail.com",
    to: to,
    subject: subject,
    text: text,
  };
  transporter.sendMail(message, (err, info) => {
    if (err) {
      console.log("Error occurred. " + err.message);
    }

    console.log("Message sent: %s", info.messageId);
  });
}

function sendEmailHTML(to, subject, html) {
  const message = {
    from: "azizrosyid783@gmail.com",
    to: to,
    subject: subject,
    html: html,
  };
  transporter.sendMail(message, (err, info) => {
    if (err) {
      console.log("Error occurred. " + err.message);
    }

    console.log("Message sent: %s", info.messageId);
  });
}

module.exports = {
  sendEmail,
  sendEmailHTML,
}
