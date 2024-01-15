FROM php:8.1-fpm-buster
ARG TIMEZONE=Poland

RUN apt update \
    && apt install -y wget \
    libxslt1-dev \
    libonig-dev \
    libzip-dev \
    libcurl4-openssl-dev \
    libpng-dev \
    libjpeg-dev \
    libmcrypt-dev

# Install php extensions
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install opcache
#RUN docker-php-ext-install json
RUN docker-php-ext-install calendar
RUN docker-php-ext-install bcmath
#RUN docker-php-ext-install xml
RUN docker-php-ext-configure zip
RUN docker-php-ext-install zip
RUN docker-php-ext-configure xsl
RUN docker-php-ext-install xsl
#RUN docker-php-ext-install bz2
RUN docker-php-ext-configure mbstring
RUN docker-php-ext-install mbstring

#RUN pecl install mcrypt-1.0.4
#RUN docker-php-ext-enable mcrypt

RUN docker-php-ext-install curl
# Custom
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

RUN docker-php-ext-configure gd
RUN docker-php-ext-install gd

# Install PECL extensions
# RUN pecl install xdebug
# RUN docker-php-ext-enable xdebug

#RUN pecl install phar
# RUN docker-php-ext-install phar

#RUN pecl install intl
RUN docker-php-ext-install intl

RUN echo "error_reporting=E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED;" >> /usr/local/etc/php/conf.d/docker-fpm.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN ln -snf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime && echo ${TIMEZONE} > /etc/timezone \
    && printf '[PHP]\ndate.timezone = "%s"\n', ${TIMEZONE} > /usr/local/etc/php/conf.d/tzone.ini \
    && "date"

WORKDIR /var/www/html
