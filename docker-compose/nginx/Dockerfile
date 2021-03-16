FROM nginx:alpine

ARG DEV_DOMAIN
ENV DEV_DOMAIN $DEV_DOMAIN

RUN apk update && apk add \
    openssl \
    bash

COPY ssl/generate-ssl.sh /etc/nginx/generate-ssl.sh
RUN chmod +x /etc/nginx/generate-ssl.sh
RUN cd /etc/nginx && ./generate-ssl.sh
# RUN ./etc/nginx/generate-ssl.sh






# # Install system dependencies
# RUN apk --update --no-cache add openssl

# # Create selfsigned SSL for localhost
# RUN openssl req -x509 -nodes -days 365 -subj "/C=CA/ST=QC/O=Company, Inc./CN=localhost" -addext "subjectAltName=DNS:localhost" -newkey rsa:2048 -keyout /etc/ssl/private/localhost.key -out /etc/ssl/certs/localhost.crt;