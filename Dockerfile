FROM ubuntu:18.04
ENV DEBIAN_FRONTEND=noninteractive

WORKDIR /var/www

COPY composer.lock composer.json package.json package-lock.json /var/www/

# Install dependencies
RUN apt update && apt upgrade -y && apt install -y \
    apache2 \
    php \
    php-xml \
    php-gd \
    php-opcache \
    php-mbstring \
    php-zip \
    php-mysql \
    libapache2-mod-php7.2 \
    zip \
    unzip \
    git \
    curl
RUN a2enmod rewrite

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www

# Copy config for apache2 laravel public folder
COPY 000-default.conf /etc/apache2/sites-available

# Install composer packages and run laravel setup
RUN cp .env.example .env
RUN composer install
RUN php artisan key:generate

# Change current user to www
# USER www

# Expose port 80 and start server
EXPOSE 80

CMD ["apachectl", "-D", "FOREGROUND"]