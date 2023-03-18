# Set the base image
FROM php:8-fpm
# Install additional packages
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libonig-dev \
    libzip-dev \
    libpq-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libmagickwand-dev \
    libssl-dev \
    libmcrypt-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www/html

# Copy the source code to the working directory
COPY . .

# Install dependencies
RUN composer install --prefer-dist --no-dev --no-autoloader --no-scripts --no-progress --no-suggest && \
    composer clear-cache

# Generate autoload files
RUN composer dump-autoload --no-scripts --no-dev --optimize


# Set the environment variables
ENV APP_ENV=production
ENV APP_DEBUG=false
RUN chmod -R 777 storage

EXPOSE 8000
EXPOSE 9515

# RUN php artisan optimize:clear
# RUN php artisan key:generate



