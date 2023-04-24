#!/bin/sh
composer install
composer dump-autoload --optimize --no-dev
composer run-script auto-scripts --no-interaction --no-dev

set -e
exec php-fpm
