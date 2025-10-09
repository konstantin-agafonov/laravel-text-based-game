FROM php:8.4-fpm

# Working directory
WORKDIR /var/www

# Install system dependencies
RUN apt update && \
    apt install -y \
        libzip-dev zip \
        build-essential \
        libpng-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
        locales libpq-dev \
        jpegoptim optipng pngquant gifsicle \
        vim unzip git curl && \
    pecl install xdebug && \
    apt clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install zip pdo_pgsql exif
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd
RUN docker-php-ext-enable exif

# Установка Xdebug
RUN docker-php-ext-enable xdebug

# Копируем конфиг Xdebug
COPY ./docker-files/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin \
    --filename=composer

# Create user
RUN groupadd -g 1000 www && \
    useradd -u 1000 -ms /bin/bash -g www www

# Copy only dependency files for cache
COPY ./app/composer.json ./app/composer.lock /var/www/

# Install dependencies WITHOUT scripts (artisan not yet available)
RUN composer install --optimize-autoloader --no-scripts

# Now copy the entire project
COPY --chown=www:www ./app /var/www

# Now run composer again to execute scripts (artisan is now available)
RUN composer install --optimize-autoloader

# Copy entrypoint
COPY ./entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Set permissions
RUN chown -R www:www /var/www

USER www

EXPOSE 9000

ENTRYPOINT ["entrypoint.sh"]

CMD ["php-fpm"]
