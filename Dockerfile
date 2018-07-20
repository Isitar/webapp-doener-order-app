FROM php:7.2-apache
ENV HOSTIP=127.0.0.1
ENV MYSQL_HOST='127.0.0.1'
ENV MYSQL_USER='root'
ENV MYSQL_PW='';

RUN a2enmod rewrite
RUN docker-php-ext-install pdo pdo_mysql

#install sass
RUN apt-get update &&\
    apt-get install --no-install-recommends --assume-yes --quiet sass &&\
    rm -rf /var/lib/apt/lists/*


#install curl, ca-certificates & git
RUN apt-get update &&\
    apt-get install --no-install-recommends --assume-yes --quiet ca-certificates curl git &&\
    rm -rf /var/lib/apt/lists/*


#xdebug
RUN pecl install xdebug-2.6.0 \
    && docker-php-ext-enable xdebug \
#    && echo "[XDebug]" >> /usr/local/etc/php/php.ini \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.remote_enable = 1" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.remote_host = $HOSTIP" >> /usr/local/etc/php/php.ini \
    && echo "xdebug.remote_handler = dbgp" >> /usr/local/etc/php/php.ini

COPY src/ /var/www/html
COPY apache-conf.conf /etc/apache2/conf-enabled/yii2.conf

#compile scss
RUN sass /var/www/html/assets/scss/custom.scss:/var/www/html/web/css/custom.css

#needed for yii to run properly (file permissions)
RUN chgrp www-data /var/www/html/web -R
RUN chmod g+w /var/www/html/web -R
RUN chgrp www-data /var/www/html/runtime -R
RUN chmod g+rwx /var/www/html/runtime -R

#prepare entrypoint
COPY docker-extended-entrypoint /usr/local/bin/
COPY startup_migrate.sh /
RUN chmod u+x /usr/local/bin/docker-extended-entrypoint
RUN chmod u+x /startup_migrate.sh
#
ENTRYPOINT ["docker-extended-entrypoint"]