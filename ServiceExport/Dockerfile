FROM node:18.12-slim
COPY package*.json ./
RUN npm install
COPY . .
CMD pwd && ls -la && npm run start