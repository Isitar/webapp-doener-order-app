FROM php:7.2-apache
ARG HOSTIP
ENV MYSQL_HOST='127.0.0.1'
ENV MYSQL_USER='root'
ENV MYSQL_PW='';

RUN a2enmod rewrite
RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update &&\
    apt-get install --no-install-recommends --assume-yes --quiet sass &&\
    rm -rf /var/lib/apt/lists/*

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

RUN sass /var/www/html/assets/scss/custom.scss:/var/www/html/web/css/custom.css
RUN chgrp www-data /var/www/html -R
RUN chmod g+w /var/www/html/web -R

EXPOSE 80
EXPOSE 443

#ENTRYPOINT php /var/www/html/yii migrate --interactive=0
