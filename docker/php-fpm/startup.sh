#!/bin/bash

#start crontab
/etc/init.d/cron start
crontab -u www-data /opt/www-data

#start supervisor
#/etc/init.d/supervisor start

#start PHP-FPM
php-fpm
