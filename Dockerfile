FROM php:7.4-apache

# Встановлення необхідних розширень
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Копіювання проєкту в контейнер
COPY . /var/www/html

# Надання прав для запису
RUN chown -R www-data:www-data /var/www/html

# Установка Composer (опційно)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
