#!/bin/sh

cd /var/www

# php artisan migrate:fresh --seed
composer install --ignore-platform-reqs
cp .env.example .env
php artisan key:generate
chmod -R 777 storage/*
npm install
npm run dev

/usr/bin/supervisord -c /etc/supervisord.conf