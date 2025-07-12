FROM php:8.4-fpm

# Build arguments for user/group
ARG USER_ID=1000
ARG GROUP_ID=1000
ARG USER_NAME=www-data
ARG GROUP_NAME=www-data

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

# Install supervisord, gosu, and Node.js (version simple)
RUN apt-get update && apt-get install -y --no-install-recommends \
    supervisor \
    curl \
    gosu \
    debian-keyring \
    debian-archive-keyring \
    apt-transport-https \
    && curl -fsSL https://deb.nodesource.com/setup_lts.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Install Caddy (standalone)
RUN curl -1sLf 'https://dl.cloudsmith.io/public/caddy/stable/gpg.key' | gpg --dearmor -o /usr/share/keyrings/caddy-stable-archive-keyring.gpg \
    && curl -1sLf 'https://dl.cloudsmith.io/public/caddy/stable/debian.deb.txt' | tee /etc/apt/sources.list.d/caddy-stable.list \
    && apt-get update \
    && apt-get install -y caddy \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Change web server config
COPY docker/caddy/Caddyfile /etc/caddy/Caddyfile

# Apply the user/group IDs to www-data
RUN usermod -u ${USER_ID} www-data && groupmod -g ${GROUP_ID} www-data

# Create composer and npm cache directories with proper ownership
RUN mkdir -p /var/www/.composer/cache /var/www/.npm && \
    chown -R www-data:www-data /var/www/.composer /var/www/.npm

# Configure PHP-FPM to use Unix socket
RUN sed -i 's|^listen = 127.0.0.1:9000|listen = /var/run/php/php-fpm.sock|' /usr/local/etc/php-fpm.d/www.conf \
    && sed -i 's|^;listen.owner = www-data|listen.owner = www-data|' /usr/local/etc/php-fpm.d/www.conf \
    && sed -i 's|^;listen.group = www-data|listen.group = www-data|' /usr/local/etc/php-fpm.d/www.conf \
    && sed -i 's|^;listen.mode = 0660|listen.mode = 0660|' /usr/local/etc/php-fpm.d/www.conf \
    && mkdir -p /var/run/php \
    && chown www-data:www-data /var/run/php

# Copy supervisord program configs
COPY docker/supervisord/conf.d/caddy-php-fpm.conf /etc/supervisord/conf.d/caddy-php-fpm.conf

# Copy queue worker config uncommented for use with yii2-queue
#COPY docker/supervisor/available/queue.conf /etc/supervisor/available/queue.conf

# Copy scripts
COPY docker/init.sh /usr/local/bin/init.sh
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh

# Make scripts executable and validate
RUN chmod +x /usr/local/bin/init.sh /usr/local/bin/entrypoint.sh && \
    # Convert any Windows line endings
    sed -i 's/\r$//' /usr/local/bin/init.sh /usr/local/bin/entrypoint.sh && \
    # Test that scripts have valid syntax
    bash -n /usr/local/bin/init.sh && \
    bash -n /usr/local/bin/entrypoint.sh && \
    echo "✓ Scripts validated successfully..."

# Use ENTRYPOINT to guarantee execution
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
