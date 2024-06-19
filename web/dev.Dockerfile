# bits-n-bytes/web/dev.Dockerfile

# Base image
FROM node:18-alpine AS base

# Create app directory
WORKDIR /usr/src/app

# Install app dependencies
COPY package*.json ./
RUN npm install

# Copy app source code
COPY . .

# Expose port
EXPOSE 3000

# Set environment variable for port
ENV PORT 3000

# Command to run the app
CMD ["npm", "run", "dev"]