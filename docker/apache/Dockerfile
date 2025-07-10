FROM yiisoftware/yii2-php:8.4-apache

# change web server config
COPY apache/apache.conf /etc/apache2/apache2.conf
COPY apache/vhost.conf /etc/apache2/sites-available/000-default.conf

# change PHP config
COPY ../php/php.ini /usr/local/etc/php/conf.d/base.ini

# install supervisord
RUN apt-get update && apt-get install -y supervisor --no-install-recommends && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
COPY apache/supervisord/supervisord.conf /etc/supervisor/supervisord.conf

# copy apache2 config
COPY apache/supervisord/conf.d/apache2.conf /etc/supervisor/conf.d/apache2.conf

# run supervisord
CMD ["supervisord", "-c", "/etc/supervisor/supervisord.conf"]
