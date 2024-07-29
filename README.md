<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

### Using Laravel 11 for the API

Laravel is a web application framework with expressive, elegant syntax. 

### Installation
This project is using Laravel Sail, a built-in docker environment for Laravel. To install the project, you need to have Docker installed on your machine.

1. Clone the repository

Laravel is accessible, powerful, and provides tools required for large, robust applications.

```bash
git clone https://github.com/cashewcodes9/vigilant-crud
```

2. Change directory to the project folder

```bash 
cd vigilant-crud
```
3. start the docker environment

```bash
./vendor/bin/sail up 

Docker will start the environment and you can access API endpoints on http://0.0.0.0:80/api

for example: http://0.0.0.0:80/api/books to get books.
```
Available endpoints are:
````
GET|HEAD        api/books -> books.index › BookController@index
POST            api/books -> books.store › BookController@store
GET|HEAD        api/books/{book} -> books.show › BookController@show
PUT|PATCH       api/books/{book} -> books.update › BookController@update
DELETE          api/books/{book} -> books.destroy › BookController@destroy
````

