# Sử dụng PHP với Apache
FROM php:8.1-apache

# Cập nhật và cài đặt các extensions cần thiết
RUN apt-get update && apt-get install -y curl unzip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql gd mbstring xml

# Cài đặt Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy toàn bộ mã nguồn vào container
COPY . /var/www/html/

# Thiết lập quyền cho thư mục Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Đặt thư mục làm việc
WORKDIR /var/www/html

# Cài đặt Composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Mở cổng 80 cho Apache
EXPOSE 80

# Chạy Apache khi container khởi động
CMD ["apache2-foreground"]
