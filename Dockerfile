FROM php:8.3-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install -j$(nproc) \
        pdo_pgsql \
        intl \
        zip \
        opcache \
    && rm -rf /var/lib/apt/lists/*

# Configure opcache for production
RUN { \
    echo 'opcache.memory_consumption=128'; \
    echo 'opcache.interned_strings_buffer=8'; \
    echo 'opcache.max_accelerated_files=4000'; \
    echo 'opcache.revalidate_freq=2'; \
    echo 'opcache.fast_shutdown=1'; \
    echo 'opcache.enable_cli=1'; \
    } > /usr/local/etc/php/conf.d/opcache-recommended.ini

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Enable Apache modules
RUN a2enmod rewrite headers

# Set working directory
WORKDIR /var/www/html

# Copy composer files first (for better layer caching)
COPY composer.json composer.lock symfony.lock ./

# Set environment variables for build
ENV APP_ENV=prod \
    APP_DEBUG=0 \
    COMPOSER_ALLOW_SUPERUSER=1

# Install PHP dependencies without running scripts
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-scripts \
    --no-interaction \
    --prefer-dist

# Copy application source code
COPY . .

# Create necessary directories and set permissions
RUN mkdir -p var/cache var/log var/share public/assets \
    && chown -R www-data:www-data var public/assets \
    && chmod -R 775 var

# Generate optimized autoloader
RUN composer dump-autoload --optimize --no-dev --classmap-authoritative

# Clear and warm up cache (with APP_SECRET set to avoid errors)
RUN APP_SECRET=dummy_secret_for_build php bin/console cache:clear --env=prod --no-debug \
    && APP_SECRET=dummy_secret_for_build php bin/console cache:warmup --env=prod --no-debug

# Install assets
RUN php bin/console assets:install public --env=prod --no-debug || true \
    && php bin/console importmap:install --env=prod --no-debug || true

# Configure Apache to serve from /var/www/html/public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Change Apache to listen on port 8000 (Koyeb requirement)
RUN sed -i 's/Listen 80/Listen 8000/g' /etc/apache2/ports.conf \
    && sed -i 's/:80/:8000/g' /etc/apache2/sites-available/*.conf

# Expose port 8000
EXPOSE 8000

# Health check
HEALTHCHECK --interval=30s --timeout=3s --start-period=40s --retries=3 \
    CMD curl -f http://localhost:8000/ || exit 1

# Set proper ownership one final time
RUN chown -R www-data:www-data /var/www/html

# Start Apache in foreground
CMD ["apache2-foreground"]
