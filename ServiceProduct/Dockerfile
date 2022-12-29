FROM node:18.12-slim
COPY package*.json ./
RUN npm install
COPY . .
EXPOSE 3000
CMD [ "npm", "run", "start" ]