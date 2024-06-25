FROM php:8.3-cli-bullseye

# Install dependencies
RUN apt update && apt install -y \
    libpq-dev \
    libsodium-dev \
    git \
    && docker-php-ext-install pdo pdo_pgsql sodium

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Give proper permissions to storage and bootstrap/cache directories
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Expose port 8000
EXPOSE 8000

# Run Laravel development server
CMD php artisan serve --host=0.0.0.0 --port=8000
