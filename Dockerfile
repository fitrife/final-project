# Gunakan PHP 8.3 dengan FPM
FROM php:8.3-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    unzip \
    supervisor

# Install PHP extensions yang dibutuhkan
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip xml

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www

# Salin semua file Laravel ke dalam container
COPY . .

# Install dependensi Laravel
RUN composer install --prefer-dist --no-dev --optimize-autoloader --ignore-platform-reqs

# Set permissions untuk direktori penting
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port untuk PHP-FPM dan Laravel
EXPOSE 8010

# Salin konfigurasi Supervisor
#COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Jalankan Supervisor untuk mengelola proses
#CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8010"]
