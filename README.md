**# MKW Dockerized Laravel**

## Introduction
Calm down, it's just dockerized laravel project skeleton to be used as a template for future projects.

**# SETUP GUIDE**

## Step 0: ONLY IF YOU ARE REINSTALLING
If you already installed composer, npm etc and you want to start over, run these commands to restore a clean state of the project:
```sh
docker-compose exec app bash -c "rm -rf ./vendor"
docker-compose exec node bash -c "rm -rf ./node_modules"
```

## Step 1: Copy setup files
Copy .env file:
```sh
cp .env.example .env
```

## Step 2: Set up proper file permissions
```sh
sudo chown -R $(whoami):$(whoami) .
sudo chmod -R 755 .
sudo chmod -R 775 ./laravel/storage ./laravel/bootstrap/cache
sudo chown -R www-data:www-data ./laravel/storage ./laravel/bootstrap/cache
```

## Step 3: Build and Start Containers
Build and start Docker containers:
```sh
docker-compose up -d --build
```

## Step 4: Install Composer dependancies
Install and update Compser:
```sh
docker-compose exec app bash -c "composer install"
docker-compose exec app bash -c "composer update"
```

## Step 5: Create, migrate and seed the Database
Create, migrate and seed the database (replace `larvel` with db name if you changed it in `.env`):
```sh
docker-compose exec app bash -c "php artisan make:empty-db laravel"
docker-compose exec app bash -c "php artisan migrate --seed"
```

## Step 6: Reinstall Node Modules
Install, update and build Node Modules (change to current version):
```sh
docker-compose exec node bash -c "npm install -g npm@11.2.0"
docker-compose exec node bash -c "npm update"
docker-compose exec node bash -c "npm run build"
```

## Step 7: Restart the Containers
Finally, restart the containers to make sure changes took effect:
```sh
docker-compose down && docker-compose up -d
```

**# REGULAR USAGE GUIDE**

## If everything is already installed
All you have to do before you visit your http://localhost to see the website, run this one docker command in the project's root directory:
```sh
docker-compose up -d
```
And after you're done using the website, run:
```sh
docker-compose down
```
