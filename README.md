##Here’s a Docker Compose setup that will:

Use PHP 8.2.12

Use Laravel 10.22.0 from your GitHub repo

Use MySQL

Automatically pull and set up your Laravel project from GitHub


## Code of Execution

chmod +x init.sh


##Make sure src/storage and src/bootstrap/cache are writable:

bash Copy Edit

chmod -R 775 src/storage src/bootstrap/cache

## Create .env for Docker
APP_NAME=LionsClubs
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=lions_db
DB_USERNAME=lions
DB_PASSWORD=secret


##Build and Run

docker compose up --build -d


## Composer Install and Laravel Setup

docker exec -it lions-app bash

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve --host=0.0.0.0 --port=80

##Access Laravel

Visit: http://localhost:8000