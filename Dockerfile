FROM php:7.2-cli

ENV DEBIAN_FRONTEND noninteractive

# Prepare basic deps
RUN apt-get update && \
        apt-get install -y \
                apt-utils \
                build-essential \
                wget \
                locales \
                curl \
                less \
                vim \
                git \
        --no-install-recommends && \
    apt-get remove -y --purge software-properties-common && \
    apt-get -y autoremove && \
        apt-get clean && \
        rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN pecl config-set preferred_state alpha \
    && pecl channel-update pecl.php.net \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install -j$(nproc) pdo_mysql

# Configure timezone and locale
RUN echo "Europe/Moscow" > /etc/timezone; dpkg-reconfigure -f noninteractive tzdata && \
        echo "en_US.UTF-8 UTF-8\nru_RU.UTF-8 UTF-8" > /etc/locale.gen && \
        locale-gen && dpkg-reconfigure locales && localedef ru_RU.UTF-8 -i ru_RU -fUTF-8
ENV LANG ru_RU.UTF-8
ENV LANGUAGE ru_RU.UTF-8
ENV LC_ALL ru_RU.UTF-8

RUN curl -sS http://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
