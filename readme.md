----------

# Getting started

## Installation

Please check the official Lumen installation guide for server requirements before you start. [Official Documentation](https://lumen.laravel.com/docs/5.5/installation)


Clone the repository

    git clone git@github.com:MKhan777/hashing.git

Switch to the repo folder

    cd lumen-jwt

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

Since Lumen doesn't have the `php artisan key:generate` command, there's a custom route `http://localhost:8000/appKey` to help you generate an application key.

Generate a random App key
Generate a random JWT authentication secret key 

   

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php -S localhost:8000 -t public

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:MKhan777/hashing.git
    cd lumen-jwt
    composer install
    cp .env.example .env
    
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php -S localhost:8000 -t public

## Database seeding

**Populate the database with seed data with relationships which includes users, articles, comments, tags, favorites and follows. This can help you to quickly start testing the api or couple a frontend and start using it with ready content.**

Run the database seeder and you're done

    php artisan db:seed



***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh


** Run composer dump autoload for files autoloading
	
	composer dump-autoload

## API Specification


----------

# Code overview

The code has three basic endpoints get(hash),post(login),post(\register). Use the Postman API builder interface to hit on these urls
		
		/register
		provide parameters  
			{
			"name"  : "sample",
			"email" : "sample@sample.com",
			"password" : "sample123"
			}
You will get a token in response.
			
			/login
			provide parameters
			{
			
			"email" : "sample@sample.com",
			"password" : "sample123"
			}

You will get a token in response.

		/hash
		provide parameters
		{
			token : "xyzxvyzsvyz"
		}
The same token that has been generated by login or register can be used here for hitting
the output will be a hash that,ll be stored in log file

## Dependencies

- 
- [firebase/php-jwt] - For authentication using JSON Web Tokens
- [fzaninotto/faker] - For fake model generating 10 users (testing)
- [phpunit/phpunit]  - For unit tests

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing API

Run the Lumen development server

    php -S localhost:8000 -t public

The api can now be accessed at

    http://localhost:8000/api

Request headers

| **Required** 	| **Key**              	| **Value**            	|
|----------	|------------------	|------------------	|
| Yes      	| Content-Type     	| application/json 	|
| Yes      	| X-Requested-With 	| XMLHttpRequest   	|
| Optional 	| Authorization    	| Token {JWT}      	|

Refer the [api specification](#api-specification) for more info.

----------
 
# Authentication
 
This applications uses JSON Web Token (JWT) to handle authentication. The token is passed with each request using the `Authorization` header with `Token` scheme. The JWT authentication middleware handles the validation and authentication of the token. Please check the following sources to learn more about JWT.
 
- https://jwt.io/introduction/
- https://self-issued.info/docs/draft-ietf-oauth-json-web-token.html

----------

