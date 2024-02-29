# Documentation
This documentation is specific to the inosof bootcamp project assignment
## Tech Stack
- PHP: 8.1.10
- Laravel Framework: 9.52.16 
- MongoDB: 7.0.5

## Instalation
1. Clone 
2. update composer
```
composer update
```
3. set your .env
```
DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

## Quick Start
1. import postman_collection.json in your postman workspace
2. register in postman
```
{
    "email": "test@example.com",
    "password": "admin"
}
```
3. login and get the acces token
```
{
    "email": "test@example.com",
    "password": "admin"
}
```
    {
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9",
    "token_type": "bearer",
    "expires_in": 3600
    }

4. You can make a request wih token.
```
eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9
```

Enjoy :)

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


