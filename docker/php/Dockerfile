FROM php:8.2.1-fpm-alpine3.16

RUN apk add --no-cache --virtual .phpize-deps-configure $PHPIZE_DEPS \
    && apk add linux-headers

RUN apk update && apk add \
    sudo \
    icu-dev \
    nodejs \
    npm \
    freetype-dev \
	libjpeg-turbo-dev \
	libpng-dev \
    libzip-dev \
    openssh \
    musl-dev \
    make \
    php8-dev \
    php8-pear \
    gcc

RUN docker-php-ext-install \
    pdo_mysql \
    intl \
    zip \
    exif

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer self-update

ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /var/www/html

#CMD bash -c "composer install && php artisan key:generate"
