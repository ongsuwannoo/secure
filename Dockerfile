FROM php:7.4-apache 
RUN docker-php-ext-install mysqli
RUN apt-get update \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip

COPY conf/php.ini /usr/local/etc/php/
COPY conf/secure_pass /etc/
