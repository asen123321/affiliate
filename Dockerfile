FROM php:8.3-fpm-alpine

# Инсталиране на системни инструменти
RUN apk add --no-cache \
    bash \
    git \
    unzip \
    libzip-dev \
    icu-dev \
    postgresql-dev \
    oniguruma-dev \
    linux-headers

# Инсталиране на PHP разширения
RUN docker-php-ext-configure intl && \
    docker-php-ext-install \
    pdo_pgsql \
    intl \
    zip \
    opcache \
    mbstring

# Инсталиране на Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# ВАЖНО: Не копираме файлове и не пускаме composer install тук,
# за да може контейнерът да тръгне дори папката да е празна.
