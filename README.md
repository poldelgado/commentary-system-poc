# Nested Comment Application System for a Laravel and Vue 3 proof of concepts.
## This is a simple nested comment application for a laravel and vue proof of concepts.

## Getting started

## Requirements:

### This project runs with:
- PHP 8.0+
- Laravel version 9.26.1+
- Node.js version 14.18+
- Composer version 2.0+

## Instalation

``` bash
# clone this repository
git clone https://github.com/poldelgado/commentary-system-poc.git
# install dependencies
composer install
npm install
# create .env file and generate the application key
cp .env.example .env
php artisan key:generate

# build CSS and JS assets
npm run dev
# or, if you prefer minified files
npm run build
```

Settings .env
```
APP_URL=localhost:8000

DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```
Then run migrations:
```
php artisan migrate
```
Then launch the server:

``` bash
php artisan serve
```

The Laravel sample project is now up and running! Access it at http://localhost:8000.

## The sent requirements  were the following:
Create a comment system single-page web application using a framework of choice (preferably Laravel 5.5+) and VueJS / React with the following requirements:  
* Assume that there is only one Blog Post that can be commented on. 
Only the user’s name and comment text are required to post a comment. 
A comment can be replied to with another comment. 
* Nested comments are up to 3 layers only 
* The page should not refresh when posting a comment. 
* Comments must be ordered by the latest. 
* Make the user interface as beautiful, responsive, and easy to use as you can. 
* Use MySQL database for storing your data. No need to edit, delete, etc of comments. 

