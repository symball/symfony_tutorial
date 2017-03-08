FROM symball/php_symfony_alpine:latest
MAINTAINER Simon Ball <simon.ball.1985@gmail.com>

ARG USER_ID=1000
ARG GROUP_ID=1000

# Prepare a user and workspace
RUN mkdir -p /var/www/html
RUN addgroup -g $GROUP_ID www-data
RUN adduser -D -h /var/www/html -s /usr/bin/bash -G www-data -u $USER_ID www-data
RUN chmod -R 775 /var/www/html
RUN chown -R www-data:www-data /var/www/html

# Change ownership of the log directory just in case not declared
# differently in conf file
RUN touch /var/log/php-fpm.log
RUN chown -R www-data:www-data /var/log/php-fpm.log

# Copy across any overrides
COPY php.conf /etc/php7/conf.d/99-overrides.conf
COPY php-fpm.conf /etc/php7/php-fpm.conf

USER www-data
WORKDIR /var/www/html

CMD ["php-fpm7", "-F"]
