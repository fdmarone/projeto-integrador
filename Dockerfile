FROM php:8.3-fpm

# Recebe UID e GID como argumentos para criar usuário compatível com o host
ARG UID=1000
ARG GID=1000

# Instala dependências
RUN apt-get update && apt-get install -y \
    sqlite3 libsqlite3-dev \
    libzip-dev zip unzip \
    git curl libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite zip mbstring gd

# Cria usuário compatível com o host
RUN addgroup --gid ${GID} laravel \
    && adduser --disabled-password --gecos "" --uid ${UID} --gid ${GID} laravel

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define diretório de trabalho (ainda como root)
WORKDIR /var/www

# Copia os arquivos (ainda como root)
COPY . .

# Adiciona o diretório como seguro para o Git (como root)
RUN git config --global --add safe.directory /var/www

# Cria os diretórios (como root)
RUN mkdir -p storage bootstrap/cache

# ACERTA O DONO: Muda o dono de TUDO para 'laravel' (como root)
RUN chown -R laravel:laravel /var/www

# ACERTA A PERMISSÃO: Libera escrita no storage/cache (como root)
RUN chmod -R 777 /var/www/storage /var/www/bootstrap/cache

# Troca para o usuário não-root
USER laravel

# Instala dependências PHP (agora como 'laravel')
RUN composer install --no-interaction

CMD ["php-fpm"]