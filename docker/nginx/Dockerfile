FROM yiisoftware/yii2-php:8.4-fpm-nginx

# change nginx config
COPY docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# change PHP config (same as Apache)
COPY docker/php/php.ini /usr/local/etc/php/conf.d/base.ini

# install supervisord
RUN apt-get update && apt-get install -y supervisor --no-install-recommends && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
COPY docker/nginx/supervisord/supervisord.conf /etc/supervisor/supervisord.conf

# copy nginx + php-fpm + queue configs for supervisord
COPY docker/nginx/supervisord/conf.d/nginx.conf /etc/supervisor/conf.d/nginx.conf
COPY docker/nginx/supervisord/conf.d/php-fpm.conf /etc/supervisor/conf.d/php-fpm.conf

# run supervisord
CMD ["supervisord", "-c", "/etc/supervisor/supervisord.conf"]
