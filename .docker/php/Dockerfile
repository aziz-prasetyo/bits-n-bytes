FROM php:8.3-fpm

COPY php.ini /usr/local/etc/php/
COPY docker.conf /usr/local/etc/php-fpm.d/docker.conf
COPY .bashrc /root/

# Install build essentials, libraries, and utilities
RUN apt-get update \
  && apt-get install -y build-essential zlib1g-dev curl gnupg procps vim git unzip libsodium-dev libzip-dev libpq-dev \
  && docker-php-ext-install sodium zip pdo_pgsql pgsql

# Install intl extension
RUN apt-get install -y libicu-dev \
  && docker-php-ext-configure intl \
  && docker-php-ext-install intl

# Install gd extension
RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
docker-php-ext-install gd

# Install redis extension
RUN pecl install redis && docker-php-ext-enable redis

# Install pcov extension
RUN pecl install pcov && docker-php-ext-enable pcov

# Download and run the setup_18.x script from NodeSource
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
# Install Node.js using the package manager
RUN apt-get install -y nodejs
# Update npm to the latest version
RUN npm install npm@latest -g
# Install Yarn globally
RUN npm install yarn -g

# Composer
# Download Composer installer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
  php -r "if (hash_file('sha384', 'composer-setup.php') === file_get_contents('https://composer.github.io/installer.sig')) { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); exit(1); } echo PHP_EOL;" && \
  # Run Composer installer
  php composer-setup.php && \
  # Remove Composer installer
  php -r "if (unlink('composer-setup.php')) { echo 'Composer installer removed successfully.'; } else { echo 'Failed to remove Composer installer.'; exit(1); }" && \
  # Move Composer to /usr/local/bin
  mv composer.phar /usr/local/bin/composer

# Allow Composer to be run as superuser
ENV COMPOSER_ALLOW_SUPERUSER 1
# Set Composer home directory
ENV COMPOSER_HOME /composer
# Add Composer vendor bin directory to PATH
ENV PATH $PATH:/composer/vendor/bin
# Set global process timeout for Composer
RUN composer config --global process-timeout 3600
# Install Laravel installer globally using Composer
RUN composer global require "laravel/installer"

# Set working directory to /root
WORKDIR /root
# Clone dircolors-solarized repository from GitHub
RUN git clone https://github.com/seebi/dircolors-solarized

# Expose port 5173
EXPOSE 5173
# Set working directory to /var/www
WORKDIR /var/www
