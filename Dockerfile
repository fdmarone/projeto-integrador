FROM php:8.3-fpm

# Recebe UID e GID como argumentos para criar usuário compatível com o host
ARG UID=1000
ARG GID=1000

# Instala dependências
RUN apt-get update && apt-get install -y \
    sqlite3 libsqlite3-dev \
    libzip-dev zip unzip \
    git curl libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite zip

# Cria usuário compatível com o host
RUN addgroup --gid ${GID} laravel \
    && adduser --disabled-password --gecos "" --uid ${UID} --gid ${GID} laravel

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define diretório de trabalho
WORKDIR /var/www

# Troca para usuário não-root
USER laravel

# Copia o código da aplicação
COPY --chown=laravel:laravel . .


# # Instala dependências PHP
# RUN composer install --no-interaction 

# Garante permissões corretas para storage/cache
RUN mkdir -p storage bootstrap/cache && chmod -R 775 storage bootstrap/cache

# RUN chown -R laravel:laravel /var/www

CMD ["php-fpm"]
