#!/bin/sh
php /createInitalUser.php

# file permissions
chown -R www-data:www-data /php-code/data/
