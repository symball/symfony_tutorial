FROM symball/php_symfony_alpine
MAINTAINER Simon Ball <contact@simonball.me>

ARG USER_ID=1000
ARG GROUP_ID=1000
ARG WEB_BASE=/var/www/html

COPY php.ini /etc/php7/conf.d/50-php.ini
COPY php-fpm.conf /etc/php7/php-fpm.conf

# Prepare a user and workspace
RUN mkdir -p $WEB_BASE
RUN addgroup -g $GROUP_ID www-data
RUN adduser -D -h $WEB_BASE -s /usr/bin/bash -G www-data -u $USER_ID www-data
RUN chmod -R 775 $WEB_BASE
RUN chown -R www-data:www-data $WEB_BASE

RUN mkdir -p /var/log/php7 && chown -R www-data:www-data /var/log/php7

EXPOSE 9000

USER www-data
WORKDIR $WEB_BASE

CMD ["php-fpm7", "-F"]
