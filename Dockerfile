FROM php:8.2-apache

# Cài đặt các extension cơ bản
RUN docker-php-ext-install pdo pdo_mysql

# Cấu hình Apache trỏ thẳng vào thư mục public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Bật rewrite để Slim Framework chạy được
RUN a2enmod rewrite

# Copy toàn bộ code vào container
COPY . /var/www/html

# Phân quyền cho toàn bộ thư mục
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html