FROM php:8.3-fpm-alpine

RUN apk update && apk add --no-cache \
           bash bash-completion autoconf make

RUN apk add --no-cache \
           postgresql-dev \
       && docker-php-ext-install -j$(nproc) pgsql \
       && docker-php-ext-install -j$(nproc) pdo_pgsql

RUN pecl install mongodb && docker-php-ext-enable mongodb

RUN <<EOF
#!/bin/sh

EXPECTED_CHECKSUM="$(php -r 'copy("https://composer.github.io/installer.sig", "php://stdout");')"
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
ACTUAL_CHECKSUM="$(php -r "echo hash_file('sha384', 'composer-setup.php');")"

if [ "$EXPECTED_CHECKSUM" != "$ACTUAL_CHECKSUM" ]
then
    >&2 echo 'ERROR: Invalid installer checksum'
    rm composer-setup.php
    exit 1
fi

php composer-setup.php --quiet --install-dir=/usr/local/bin --filename=composer
RESULT=$?
rm composer-setup.php
exit $RESULT
EOF

WORKDIR /var/www/html
