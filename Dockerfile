FROM php:8.4-fpm

# Рабочая директория
WORKDIR /var/www

# Установка системных зависимостей
RUN apt update && \
    apt install -y \
        libzip-dev zip \
        build-essential \
        libpng-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
        locales libpq-dev \
        jpegoptim optipng pngquant gifsicle \
        vim unzip git curl \
    && apt clean && rm -rf /var/lib/apt/lists/*

# Установка расширений PHP
RUN docker-php-ext-install zip pdo_pgsql exif
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd
RUN docker-php-ext-enable exif

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin \
    --filename=composer

# Создание пользователя
RUN groupadd -g 1000 www && \
    useradd -u 1000 -ms /bin/bash -g www www

# Копируем только файлы зависимостей для кеша
COPY ./app/composer.json ./app/composer.lock /var/www/

# Ставим зависимости БЕЗ скриптов (artisan ещё нет)
RUN composer install --optimize-autoloader --no-scripts

# Теперь копируем весь проект
COPY --chown=www:www ./app /var/www

# Теперь можно запустить composer заново, чтобы прошли скрипты (artisan уже есть)
RUN composer install --optimize-autoloader

# Копируем entrypoint
COPY ./entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Права
RUN chown -R www:www /var/www

USER www

EXPOSE 9000

ENTRYPOINT ["entrypoint.sh"]

CMD ["php-fpm"]
