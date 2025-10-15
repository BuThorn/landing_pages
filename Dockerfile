FROM php:8.2-apache

# Install common PHP extensions and tools
RUN apt-get update && apt-get install -y --no-install-recommends \
    libzip-dev zip unzip git && \
    docker-php-ext-install pdo pdo_mysql zip && \
    rm -rf /var/lib/apt/lists/*

# Enable apache mods and set document root
ENV APACHE_DOCUMENT_ROOT /var/www/html
RUN sed -ri -e 's!DocumentRoot /var/www/html!DocumentRoot ${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!<Directory /var/www/>!<Directory ${APACHE_DOCUMENT_ROOT}>!g' /etc/apache2/apache2.conf

# Copy app files
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
CMD ["apache2-foreground"]
