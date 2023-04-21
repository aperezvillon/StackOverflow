FROM php:8.1-fpm

# PHP deps
RUN apt-get update -qq && \
    apt-get install -y -qq --no-install-recommends \
    git \
    wget \
    libxml2-dev \
    libzip-dev \
    unzip \
    && \
    rm -Rf /var/lib/apt/lists/* && \
    docker-php-ext-install \
    pdo \
    pdo_mysql \
    soap \
    zip \
    bcmath \
    sockets

WORKDIR /var/www/app

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony
RUN git config --global user.email "you@example.com" \
    && git config --global user.name "Your Name"


