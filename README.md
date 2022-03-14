<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About
Backend CRUD API project to register Donor data.

## Tools

:hammer_and_wrench: PHP 7.4.23

:hammer_and_wrench: Laravel 8

:hammer_and_wrench: MySQL

:hammer_and_wrench: Docker

:hammer_and_wrench: Imnsonia

## Start

* At the root of your project, run via command line:

~~~powershell
1. cp .env.example .env
2. docker-compose up -d
3. docker-compose exec donors_backend bash
4. composer install
5. php artisan key:generate
6. php artisan migrate
~~~

## Testes

* At the root of your project, import the "Insomnia_2022-03-14.json" collection into your imnsonia.

## Features

### Donors

- [X] Create
- [X] Update
- [X] Get All
- [X] Get By UUID

### Transactions

- [X] Create
- [X] Update
- [X] Get All
- [X] Get By UUID

### Accounts

- [X] Create
- [X] Update
- [X] Get All
- [X] Get By UUID

### Auth

- [X] Register
- [X] Auth (Login)
- [X] Logout
- [X] Me (User data)
