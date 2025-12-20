FROM php:8.3-apache

# Install system dependencies and PHP extensions in one layer
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
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

# Configure PHP for production
RUN { \
    echo 'opcache.memory_consumption=128'; \
    echo 'opcache.interned_strings_buffer=8'; \
    echo 'opcache.max_accelerated_files=4000'; \
    echo 'opcache.revalidate_freq=2'; \
    echo 'opcache.fast_shutdown=1'; \
    echo 'opcache.enable_cli=1'; \
    echo 'memory_limit=256M'; \
    echo 'max_execution_time=60'; \
    echo 'upload_max_filesize=20M'; \
    echo 'post_max_size=20M'; \
    } > /usr/local/etc/php/conf.d/php-production.ini

# Install Composer 2
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Enable required Apache modules
RUN a2enmod rewrite headers

# Set working directory
WORKDIR /var/www/html

# Copy dependency files for layer caching
COPY composer.json composer.lock symfony.lock ./

# Set build-time environment variables
ENV APP_ENV=prod \
    APP_DEBUG=0 \
    COMPOSER_ALLOW_SUPERUSER=1

# Install composer dependencies (production only, no scripts)
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-scripts \
    --no-interaction \
    --prefer-dist \
    && composer clear-cache

# Copy application code
COPY . .

# Create required directories with proper permissions
RUN mkdir -p \
    var/cache/prod \
    var/log \
    var/share \
    public/assets \
    && chown -R www-data:www-data var public/assets \
    && chmod -R 775 var

# Generate optimized autoloader for production
RUN composer dump-autoload --optimize --no-dev --classmap-authoritative

# Warm up Symfony cache for production with dummy secret
RUN APP_SECRET=dummy_build_secret_32_chars_long php bin/console cache:clear --env=prod --no-debug \
    && APP_SECRET=dummy_build_secret_32_chars_long php bin/console cache:warmup --env=prod --no-debug \
    && chown -R www-data:www-data var/cache

# Install assets (optional, won't fail if none exist)
RUN php bin/console assets:install public --env=prod --no-debug 2>/dev/null || true \
    && php bin/console importmap:install --env=prod --no-debug 2>/dev/null || true

# Configure Apache document root
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Update Apache configuration for Symfony public directory
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf \
    && sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Configure Apache to listen on port 8000 (Koyeb default)
RUN sed -i 's/Listen 80/Listen 8000/g' /etc/apache2/ports.conf \
    && sed -i 's/:80/:8000/g' /etc/apache2/sites-available/*.conf

# Create proper VirtualHost configuration for Symfony
RUN echo '<VirtualHost *:8000>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Require all granted\n\
        FallbackResource /index.php\n\
    </Directory>\n\
    <Directory /var/www/html/public/bundles>\n\
        FallbackResource disabled\n\
    </Directory>\n\
    ErrorLog ${APACHE_LOG_DIR}/error.log\n\
    CustomLog ${APACHE_LOG_DIR}/access.log combined\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# Set final permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 8000
EXPOSE 8000

# Add healthcheck (requires curl)
HEALTHCHECK --interval=30s --timeout=5s --start-period=60s --retries=3 \
    CMD curl -f http://localhost:8000/ || exit 1

# Start Apache in foreground
CMD ["apache2-foreground"]
