FROM php:latest

RUN apt-get update

RUN apt-get install -y git zip unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

RUN mkdir -p /var/www

WORKDIR /var/www

ENV COMPOSER_ALLOW_SUPERUSER=1

CMD ["composer", "test"]