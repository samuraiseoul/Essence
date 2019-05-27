FROM php:latest

RUN apt-get update

RUN apt-get install -y git zip unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

RUN mkdir -p /var/www

WORKDIR /var/www

COPY . /var/www

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer install

RUN composer dump-autoload -o

CMD ["composer", "test"]
