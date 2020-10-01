FROM php:7.2-apache
LABEL maintainer Ronaldo Goncalves <rsurfings@gmail.com>

ENV MAGENTO_VERSION 2.3.5
ENV INSTALL_DIR /var/www/html

ARG user=www-data

WORKDIR ${INSTALL_DIR}

# add group user
RUN usermod -u 1000 ${user}
RUN usermod -a -G users ${user}

# update and install dependency
RUN apt-get update \
  && apt-get install -y \
    libfreetype6-dev \
    libicu-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    libxslt1-dev \
    git \
    vim \
    wget \
    lynx \
    psmisc \
    && php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
  && apt-get clean

# install php ext
RUN docker-php-ext-configure \
    gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/; \
  docker-php-ext-install \
    gd \
    intl \
    mbstring \
    pdo_mysql \
    xsl \
    zip \
    opcache \
    bcmath \
    soap \
    sockets

# Install xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Install imagick
RUN apt-get update && apt-get install -y libmagickwand-6.q16-dev --no-install-recommends \
		&& ln -s /usr/lib/x86_64-linux-gnu/ImageMagick-6.8.9/bin-Q16/MagickWand-config /usr/bin \
		&& pecl install imagick \
		&& echo "extension=imagick.so" > /usr/local/etc/php/conf.d/ext-imagick.ini

# set recommended PHP.ini settings # see https://secure.php.net/manual/en/opcache.installation.php
RUN { \
        echo 'opcache.memory_consumption=128'; \
        echo 'opcache.interned_strings_buffer=8'; \
        echo 'opcache.max_accelerated_files=4000'; \
        echo 'opcache.revalidate_freq=60'; \
        echo 'opcache.fast_shutdown=1'; \
        echo 'opcache.enable_cli=1'; \
    } > /usr/local/etc/php/conf.d/opcache-recommended.ini

# url rewrite
RUN a2enmod rewrite

# memory for php limit
RUN echo "memory_limit=2048M" > /usr/local/etc/php/conf.d/memory-limit.ini
RUN echo "extension=imagick.so" >> /etc/php.ini 

# authentication for magento
COPY ./auth.json .

# cleaning and removing temporary archives
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# adding shell install magento
ADD ./install-magento /usr/local/bin/install-magento

# permission for exec
RUN chmod u+x /usr/local/bin/install-magento

RUN chown -R ${user}:${user} .
