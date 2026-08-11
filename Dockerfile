
FROM php:8.3-fpm AS base

# install linux dependencies and remove with runtime
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    libonig-dev \
        libxml2-dev \
    && rm -rf /var/lib/apt/lists/*


RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    bcmath \
    xml \
    intl \
    zip


# composer stage
# don't need in runtime
FROM composer:2 AS composer

# dependencies stage
FROM base AS deps
# because php apps
WORKDIR /var/www/html

COPY composer.json composer.lock ./

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN composer install \
#no deployment packge in runtime 
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --no-progress \
    --optimize-autoloader \
        --no-scripts


FROM base AS app

WORKDIR /var/www/html

COPY --from=deps /var/www/html/vendor ./vendor

COPY . .

# to make php-fpm able to write 
RUN chown -R www-data:www-data \
    storage \
    bootstrap/cache



# runtime stage

FROM base AS runtime


WORKDIR /var/www/html

COPY --from=app /var/www/html ./

EXPOSE 9000

CMD ["php-fpm"]





# arch explain
#[deps
# ↓
#vendor


#app
# ↓
#Laravel source + vendor


#runtime
#↓
#PHP-FPM + Laravel]