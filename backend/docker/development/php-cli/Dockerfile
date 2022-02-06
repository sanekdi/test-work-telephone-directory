FROM php:8.0-cli

# Install the packages you need
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libfreetype6-dev \
    locales \
    libzip-dev \
    zip \
    unzip \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install the extensions of your preference
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quiet

ENV COMPOSER_ALLOW_SUPERUSER 1

# Set your working directory
WORKDIR /app
