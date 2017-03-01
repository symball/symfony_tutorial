FROM symball/php_symfony_alpine
MAINTAINER Simon Ball <contact@simonball.me>

ARG USER_ID=1000
ARG GROUP_ID=1000
ARG WEB_BASE=/var/www/html

RUN apk --update add \
  autoconf \
  bash \
  ca-certificates \
  curl \
  git \
  libsasl \
  nodejs \
  openssh \
  wget \
  && ssh-keygen -A \
  && rm -rf /var/cache/apk/*

# Symfony dedicated installer
RUN curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony && \
  chmod a+x /usr/local/bin/symfony && symfony --version
# Install composer
RUN curl -sS https://getcomposer.org/installer | \
  php -- --install-dir=/usr/local/bin --filename=composer && composer --version

# Install PHPUnit
COPY phpunit.phar /usr/local/bin/phpunit
RUN chmod +x /usr/local/bin/phpunit && \
  phpunit --version

# GulpJS task runner
RUN npm install gulp -g && gulp -v
# bower package manager
RUN npm install bower -g && bower -v

# Prepare a user and workspace
RUN mkdir -p $WEB_BASE
RUN addgroup -g $GROUP_ID www-data
RUN adduser -D -h $WEB_BASE -s /usr/bin/bash -G www-data -u $USER_ID www-data
RUN chmod -R 775 $WEB_BASE
RUN chown -R www-data:www-data $WEB_BASE

# Change ownership of the PHP log directory
RUN mkdir -p /var/log/php7 && chown -R www-data:www-data /var/log/php7


USER www-data
WORKDIR $WEB_BASE

CMD ["/bin/bash"]
