# Sử dụng PHP với Apache
FROM php:8.1-apache

# Cài đặt các extensions cần thiết
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy toàn bộ code vào container
COPY . /var/www/html/
WORKDIR /var/www/html/public
# Cấp quyền cho thư mục
RUN chown -R www-data:www-data /var/www/html

# Mở cổng 80
EXPOSE 80

# Chạy Apache khi container khởi động
CMD ["apache2-foreground"]
