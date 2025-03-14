**# MKW Progress Share**

## Introduction
Welcome to this Laravel-based project! This application is designed to provide a robust development environment using Docker. The setup ensures seamless integration of Laravel, MySQL, Nginx, and Node.js, making development and deployment efficient. Follow the steps below to get started quickly.

**# SETUP GUIDE**

## Step 0: If everything is already installed
All you have to do before you visit your localhost:8000 to see the website, run this one docker command in the project's root directory:
```sh
docker-compose up -d
```
And after you're done using the website, run:
```sh
docker-compose down
```

## Step 1: Copy setup files
Copy .env file:
```sh
cp .env.example .env
```

## Step 2: Build and Start Containers
Build Docker containers:
```sh
docker-compose build
```
Start Docker containers:
```sh
docker-compose up -d
```

## Step 3: Install Composer dependancies
[ONLY IF REINSTALLING] Remove Composer packages:
```sh
docker-compose exec app bash -c "rm -rf ./vendor"
```
Install Compser:
```sh
docker-compose exec app bash -c "composer install"
```
Update Composer:
```sh
docker-compose exec app bash -c "composer update"
```

## Step 4: Create, migrate and seed the Database
Create an empty database:
```sh
docker-compose exec app bash -c "php artisan make:empty-db laravel"
```
Migrate and seed the database:
```sh
docker-compose exec app bash -c "php artisan migrate --seed"
```

## Step 5: Reinstall Node Modules
[ONLY IF REINSTALLING] Remove existing `node_modules`:
```sh
docker-compose exec node bash -c "rm -rf node_modules"
```
Install Node Modules:
```sh
docker-compose exec node bash -c "npm install"
```

## Step 6: Restart the Containers
Finally, restart the containers to make sure changes took effect, especially for node modules:
```sh
docker-compose down && docker-compose up -d
```
