<h1 align="center">Laravel Blog</h1>

## About Laravel Blog

Laravel Blog is minimal blogging platform developed in [Laravel](http://laravel.com/) 

This project contains technologies:
* [Bootstrap](https://getbootstrap.com/)
* [jQuery](https://jquery.com/)
* [TinyMCE](https://www.tinymce.com/) 
* [Scout](https://github.com/laravel/scout)
* [Algolia Search System for full text-searching](https://www.algolia.com/doc/framework-integration/laravel/getting-started/introduction-to-scout-extended/?client=php)
* [Intervention Image for optimizing images](https://image.intervention.io)
* [Font Awesome](http://fontawesome.io/)

It also covers (not limited to) the laravel framework's features like:

- [Authentication](https://laravel.com/docs/authentication)
- [Blade](https://laravel.com/docs/blade)
- [Broadcasting](https://laravel.com/docs/broadcasting)
- [Cache](https://laravel.com/docs/cache)
- [Email Verification](https://laravel.com/docs/verification)
- [Filesystem](https://laravel.com/docs/filesystem)
- [Helpers](https://laravel.com/docs/helpers)
- [Eloquent Relationships](https://laravel.com/docs/eloquent-relationships)
- [Localization](https://laravel.com/docs/localization)
- [Mail](https://laravel.com/docs/mail)
- [Migrations](https://laravel.com/docs/migrations)
- [Providers](https://laravel.com/docs/providers)
- [Requests](https://laravel.com/docs/validation#form-request-validation)
- [Seeding & Factories](https://laravel.com/docs/seeding)


## Requirements
- Composer
- PHP >= 5.6.4
- PHP extensions (PDO, SQLite, OpenSSL, Mbstring, Tokenizer)

## Installation

1. Clone the project: `git clone https://github.com/muhaimenul/laravel-blog`

2. Go to the root of your project and run `composer install`

3. Run `npm install` to install all frontend dependencies

4. Create an env file `cp .env.example .env` and add related data

5. Run `php artisan key:generate`

6. Add  permissions to storage and bootstrap: `sudo chmod -R 777 ./storage ./bootstrap`

7. Run `php artisan vendor:publish` to publish vendor files

8. Run `php artisan migrate` to create database tables


## Core Features

* Dashboard for Admin and editor
* Manage Articles section
* Manage Tags section
* Manage Categories section
* Fast and smooth full-text searching with Algolia Search
* Markdown editor - TinyMce
* Optmized media manager allows upload images
* Responsive Layout
* Contact Mail Form
* Personal Portfolio page


## Author
Feel free to email to Muhaimenul Islam at i..muhaimen@gmail.com, if you have any question.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
