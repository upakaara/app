FROM malitta/lumen

RUN apt-get update && apt-get install -y  \
	php-imagick \
	php7.0-pgsql \
	php7.0-sqlite

RUN phpenmod imagick

ENV CONTAINER_TYPE app
