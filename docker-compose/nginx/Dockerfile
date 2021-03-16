# Use nginx alpine latest image
FROM nginx:alpine

# Add DEV DOMAIN arg from .env as var
ARG DEV_DOMAIN
ENV DEV_DOMAIN $DEV_DOMAIN

# Install openssl and bash to alpine
RUN apk update && apk add \
    openssl \
    bash

# Import shell files
COPY ssl/generate-ssl.sh /etc/nginx/generate-ssl.sh
COPY ssl/vhost.sh /etc/nginx/vhost.sh

# Set execute privileges to imported shell files
RUN chmod +x /etc/nginx/generate-ssl.sh
RUN chmod +x /etc/nginx/vhost.sh

# Run imported shell files
RUN cd /etc/nginx && ./generate-ssl.sh
RUN cd /etc/nginx && ./vhost.sh

# Expose ports 80 (HTTP) and 443 (HTTPS)
EXPOSE 80
EXPOSE 443