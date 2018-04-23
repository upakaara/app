FROM nginx:1.10

WORKDIR /var/www
ADD vhost.conf /etc/nginx/conf.d/default.conf
ADD . /var/www