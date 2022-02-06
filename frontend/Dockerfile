FROM node:14.3-alpine as build-stage
WORKDIR /app
COPY  ./public/ ./
RUN npm install
COPY  ./public/ ./
RUN npm run build

# этап production (production-stage)
FROM nginx:stable-alpine as production-stage
COPY --from=build-stage /app/dist /usr/share/nginx/html
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
