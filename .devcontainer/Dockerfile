FROM php:8.4-cli-bookworm

# The library needs ext-ffi. git and unzip are used by composer.
RUN apt-get update \
    && apt-get install -y --no-install-recommends libffi-dev git unzip \
    && docker-php-ext-install ffi \
    && rm -rf /var/lib/apt/lists/*

# Install xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug
# Configure xdebug
RUN echo "xdebug.mode = debug" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.start_with_request = yes" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.client_port = 9000" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && rm -rf /tmp/pear

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
