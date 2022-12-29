module.exports = function (payload) {
  if (!payload) throw new Error("Payload is required");
  if (!payload.type) throw new Error("Payload type is required");
  if (!payload.email) throw new Error("Payload email is required");
};
