FROM php:8.1-fpm

# Установка необходимых расширений
RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    && rm -r /var/lib/apt/lists/*
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache    
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage && chmod -R 775 /var/www/html/storage
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo pdo_mysql


# Копирование файлов приложения
COPY . /var/www/html
WORKDIR /var/www/html

# Установка зависимостей
RUN composer install
