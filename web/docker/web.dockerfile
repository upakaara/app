FROM nginx:1.10

WORKDIR /var/www
ADD ./files/vhost.conf /etc/nginx/conf.d/default.conf
ADD . /var/www