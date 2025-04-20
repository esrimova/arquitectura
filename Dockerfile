FROM php:8.2-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip libpng-dev libonig-dev curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crear directorio de la app
WORKDIR /var/www

# Copiar los archivos del proyecto
COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Generar APP_KEY automáticamente (esto se puede hacer en el deploy si quieres)
RUN php artisan config:clear

# Puerto para Laravel
EXPOSE 10000

# Comando que inicia el servidor
CMD php artisan serve --host=0.0.0.0 --port=10000
