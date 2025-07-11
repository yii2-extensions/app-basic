FROM yiisoftware/yii2-php:8.4-fpm-nginx

# Change nginx config
COPY docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf

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
COPY docker/nginx/supervisord/supervisord.conf /etc/supervisor/supervisord.conf

# Copy supervisord program configs
COPY docker/nginx/supervisord/conf.d/nginx.conf /etc/supervisor/conf.d/nginx.conf
COPY docker/nginx/supervisord/conf.d/php-fpm.conf /etc/supervisor/conf.d/php-fpm.conf

# Copy queue worker config uncommented for use with yii2-queue
#COPY docker/apache/supervisord/conf.d/queue.conf /etc/supervisor/conf.d/queue.conf

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
