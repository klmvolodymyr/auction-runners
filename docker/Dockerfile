FROM php:latest

WORKDIR /auction-runners

RUN apt-get update && apt-get install -y git
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY . .

RUN chmod +x /usr/bin/composer
RUN composer install --ignore-platform-reqs --no-cache --dev