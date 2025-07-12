FROM yiisoftware/yii2-php:8.4-apache

# Build arguments for user/group
ARG USER_ID=1000
ARG GROUP_ID=1000
ARG USER_NAME=www-data
ARG GROUP_NAME=www-data

# Enable SSL modules and configure ports before copying config
RUN a2enmod ssl rewrite headers mime \
    && echo "Listen 80" > /etc/apache2/ports.conf \
    && echo "Listen 443 ssl" >> /etc/apache2/ports.conf

# Change web server config
COPY docker/apache/apache.conf /etc/apache2/apache2.conf
COPY docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf

# Change PHP config
COPY docker/php/php.ini /usr/local/etc/php/conf.d/base.ini

# Set document root to /app/public (Yii2 structure)
WORKDIR /app

# Set composer environment
ENV COMPOSER_ALLOW_SUPERUSER=1

# Install supervisord, gosu, and Node.js (version simple)
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

# Create composer and npm cache directories with proper ownership
RUN mkdir -p /var/www/.composer/cache /var/www/.npm && \
    chown -R www-data:www-data /var/www/.composer /var/www/.npm

# Copy supervisord program configs
COPY docker/supervisord/conf.d/apache2.conf /etc/supervisor/conf.d/apache2.conf

# Copy queue worker config uncommented for use with yii2-queue
#COPY docker/supervisord/conf.d/queue.conf /etc/supervisor/conf.d/queue.conf

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
