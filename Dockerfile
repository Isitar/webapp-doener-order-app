FROM php:7.2-apache
RUN a2enmod rewrite
RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update &&\
    apt-get install --no-install-recommends --assume-yes --quiet ca-certificates curl git &&\
    rm -rf /var/lib/apt/lists/*

	
RUN pecl install xdebug-2.6.0 \
    && docker-php-ext-enable xdebug \
    && echo "[XDebug]" >> /usr/local/etc/php/php.ini \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.remote_enable = 1" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.remote_host = $HOSTIP" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.remote_handler = dbgp" >> /usr/local/etc/php/php.ini

COPY src/ /var/www/html
COPY apache-conf.conf /etc/apache2/conf-enabled/yii2.conf

RUN php /var/www/html/yii migrate --interactive=0
