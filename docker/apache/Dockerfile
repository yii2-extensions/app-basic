FROM yiisoftware/yii2-php:8.4-apache

# Enable SSL modules and configure ports before copying config
RUN a2enmod ssl rewrite headers mime \
    && echo "Listen 80" > /etc/apache2/ports.conf \
    && echo "Listen 443 ssl" >> /etc/apache2/ports.conf

# Change web server config
COPY docker/apache/apache.conf /etc/apache2/apache2.conf
COPY docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf

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
COPY docker/apache/supervisord/supervisord.conf /etc/supervisor/supervisord.conf

# Copy supervisord program configs
COPY docker/apache/supervisord/conf.d/apache2.conf /etc/supervisor/conf.d/apache2.conf

# Copy queue worker config uncommented for use with yii2-queue
#COPY docker/apache/supervisord/conf.d/queue.conf /etc/supervisor/conf.d/queue.conf

# Run supervisord
CMD ["supervisord", "-c", "/etc/supervisor/supervisord.conf"]
