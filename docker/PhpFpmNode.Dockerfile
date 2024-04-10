FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
  zlib1g-dev \
  libzip-dev \
  unzip \
  libpng-dev \
  libfreetype6-dev \
  nodejs \
  npm \
  supervisor

RUN apt-get update \
  && docker-php-ext-install pdo pdo_mysql zip pcntl \
  && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=2.2.0 \
  && docker-php-ext-install -j$(nproc) gd \
  && docker-php-ext-configure gd --with-freetype

COPY docker/supervisor/supervisord.conf /etc/supervisor/supervisord.conf

CMD ["/usr/bin/supervisord", "-n", "-c",  "/etc/supervisor/supervisord.conf"]
