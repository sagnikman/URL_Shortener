# URL Shortener

> ### Web Application for generating custom/random short URLs for long URL.

![](https://raw.githubusercontent.com/sagnikman/Url_Shortener/main/storage/URL_Shortener_Project_Demo.gif)

----------

# Getting started

## Installation

Please check the official laravel installation guide before you start. [Official Documentation](https://laravel.com/docs/9.x/installation)
 

Clone the repository

    git clone https://github.com/sagnikman/Url_Shortener.git

Switch to the repo folder

    cd Url_Shortener

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate
    
Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/sagnikman/Url_Shortener.git
    cd Url_Shortener
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

# Code overview

## Dependencies

## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Controllers/` - Contains all the api controllers
- `config` - Contains all the application configuration files
- `database/migrations` - Contains all the database migrations
- `resources/views` - Contains all the blade files
- `routes` - Contains all the api routes defined in api.php file

## Environment variables

- `.env` - Environment variables can be set in this file
