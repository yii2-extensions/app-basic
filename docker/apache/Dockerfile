FROM yiisoftware/yii2-php:8.4-apache

# change web server config
COPY docker/apache/apache.conf /etc/apache2/apache2.conf
COPY docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf

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
COPY docker/apache/supervisord/supervisord.conf /etc/supervisor/supervisord.conf

# copy supervisord program configs
COPY docker/apache/supervisord/conf.d/apache2.conf /etc/supervisor/conf.d/apache2.conf

# copy queue worker config uncommented for use with yii2-queue
#COPY docker/apache/supervisord/conf.d/queue.conf /etc/supervisor/conf.d/queue.conf

# run supervisord
CMD ["supervisord", "-c", "/etc/supervisor/supervisord.conf"]
