#!/bin/bash

# Clone project only if not already present
if [ ! -d "src" ]; then
  git clone https://github.com/Hiteshv253/lions-clubs-International.git src
fi

cd src || exit

# Copy .env if it doesn't exist
if [ ! -f ".env" ]; then
  cp .env.example .env
fi

# Wait for MySQL to be ready
echo "⏳ Waiting for MySQL to be ready..."
sleep 15

# Run composer, migrate, and generate key
docker exec laravel_app composer install
docker exec laravel_app php artisan key:generate
docker exec laravel_app php artisan migrate
