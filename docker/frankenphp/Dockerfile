FROM dunglas/frankenphp:1.8-php8.4

# change web server config
COPY docker/frankenphp/Caddyfile /etc/caddy/Caddyfile

# set document root to /app/public (Yii2 structure)
WORKDIR /app

# install required system packages for PHP extensions for Yii 2.0 Framework
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions \
        bcmath \
        exif \
        gd \
        imagick \
        intl \
        opcache \
        pdo_mysql \
        pdo_pgsql \
        soap \
        xdebug \
        zip

# change PHP config
COPY docker/php/php.ini /usr/local/etc/php/conf.d/base.ini

# install supervisord and Node.js (includes npm)
RUN apt-get update && apt-get install -y \
    supervisor \
    curl \
    --no-install-recommends \
    && curl -fsSL https://deb.nodesource.com/setup_lts.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# copy supervisord config
COPY docker/frankenphp/supervisord/supervisord.conf /etc/supervisor/supervisord.conf

# copy supervisord program configs
COPY docker/frankenphp/supervisord/conf.d/frankenphp.conf /etc/supervisor/conf.d/frankenphp.conf

# copy queue worker config uncommented for use with yii2-queue
#COPY docker/frankenphp/supervisord/conf.d/queue.conf /etc/supervisor/conf.d/queue.conf

# Run supervisord
CMD ["supervisord", "-c", "/etc/supervisor/supervisord.conf"]
