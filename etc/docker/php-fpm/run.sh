#!/bin/sh
composer install --no-scripts --no-autoloader --prefer-dist --no-interaction --no-suggest --no-dev
composer dump-autoload --optimize --no-dev
composer run-script auto-scripts --no-interaction --no-dev

set -e
exec php-fpm
