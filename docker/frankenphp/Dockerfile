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

# Install supervisord, Node.js, and su-exec
RUN apt-get update && apt-get install -y --no-install-recommends \
    supervisor \
    curl \
    gosu \
    && curl -fsSL https://deb.nodesource.com/setup_lts.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Apply the user/group IDs to www-data
RUN usermod -u ${USER_ID} www-data && groupmod -g ${GROUP_ID} www-data

# Copy supervisord config
COPY docker/frankenphp/supervisord/supervisord.conf /etc/supervisor/supervisord.conf

# Copy supervisord program configs
COPY docker/frankenphp/supervisord/conf.d/frankenphp.conf /etc/supervisor/conf.d/frankenphp.conf

# Copy queue worker config uncommented for use with yii2-queue
#COPY docker/frankenphp/supervisord/conf.d/queue.conf /etc/supervisor/conf.d/queue.conf

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
    echo "Scripts validated successfully"

# Use ENTRYPOINT to guarantee execution
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
