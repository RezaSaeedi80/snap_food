# Introduction
**This project is an experimental project and a clone of Snapfood**

# Installation

 - composer install
			
			> $ composer install
- laravel key generate
			
		> $ php artisan key:generate

- laravel create .env file

		> $  cp .env.example .env

- config database information in .env file
- laravel migrate database
			
			> $ php artisan migrate:fresh --seed

# Prerequisites

The development Docker containers do not automatically build vendor files for PHP or JS, this is left as a developer responsibility. Therefore you will need the following tools:

-   Git
-   [Composer](http://getcomposer.org/)
-   NPM 

## Clone the repository

Create a folder then open the terminal in it and enter the following code in the terminal

git clone git@github.com:<your_id>/snap_food.git

# Used packages

 - [Spati role & permission](https://spatie.be/docs/laravel-permission/v5/introduction)
 - [Breeze](https://github.com/laravel/breeze)
 - [Laravel Sanctum](https://github.com/laravel/sanctum)
 - [Spatie opening hours](https://github.com/spatie/opening-hours)
 - [Chartisan](https://charts.erik.cat/)
 - [Fast Excel](https://github.com/rap2hpoutre/fast-excel)
