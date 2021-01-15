FROM nginx:latest

ADD development/vhost.conf /etc/nginx/conf.d/default.conf
ADD development/nginx.conf /etc/nginx/nginx.conf


COPY public /var/www/public
