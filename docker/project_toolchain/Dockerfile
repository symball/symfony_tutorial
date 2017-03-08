FROM symball/php_symfony_alpine:toolchain
USER root

ARG USER_ID
ARG GROUP_ID

# Prepare a user and workspace
RUN mkdir -p /var/www/html
RUN addgroup -g $GROUP_ID www-data
RUN adduser -D -h /var/www/html -s /usr/bin/bash -G www-data -u $USER_ID www-data
RUN chmod -R 775 /var/www/html
RUN chown -R www-data:www-data /var/www/html

USER www-data
WORKDIR /var/www/html

CMD ["/bin/bash"]
