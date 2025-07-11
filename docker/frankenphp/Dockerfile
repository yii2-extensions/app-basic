FROM dunglas/frankenphp:1.8-php8.4

# Build arguments for user/group
ARG USER_ID=1000
ARG GROUP_ID=1000
ARG USER_NAME=www-data
ARG GROUP_NAME=www-data

# Change web server config
COPY docker/frankenphp/Caddyfile /etc/caddy/Caddyfile

# Set document root to /app/public (Yii2 structure)
WORKDIR /app

# Install required system packages for PHP extensions for Yii 2.0 Framework
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions \
        bcmath \
        @composer \
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

# Set composer environment
ENV COMPOSER_ALLOW_SUPERUSER=1

# Change PHP config
COPY docker/php/php.ini /usr/local/etc/php/conf.d/base.ini

# Install supervisord and Node.js (includes npm)
RUN apt-get update && apt-get install -y \
    supervisor \
    curl \
    --no-install-recommends \
    && curl -fsSL https://deb.nodesource.com/setup_lts.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Copy supervisord config
COPY docker/frankenphp/supervisord/supervisord.conf /etc/supervisor/supervisord.conf

# Copy supervisord program configs
COPY docker/frankenphp/supervisord/conf.d/frankenphp.conf /etc/supervisor/conf.d/frankenphp.conf

# Copy queue worker config uncommented for use with yii2-queue
#COPY docker/frankenphp/supervisord/conf.d/queue.conf /etc/supervisor/conf.d/queue.conf

# Create necessary directories and set permissions
RUN mkdir -p /app/runtime/cache /app/runtime/logs && \
    chown -R ${USER_NAME}:${GROUP_NAME} /var/run /app && \
    chown -R ${USER_NAME}:${GROUP_NAME} /app/public /app/runtime && \
    chmod -R 755 /app && \
    chmod -R 775 /app/runtime /app/public

# Copy init script
COPY docker/init.sh /usr/local/bin/init.sh

# Make init script executable
RUN chmod +x /usr/local/bin/init.sh

# Run initialization script and then supervisord
CMD ["/usr/local/bin/init.sh"]
