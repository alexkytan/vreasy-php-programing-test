# Vreasy PHP Programming Test
## Local project setting up
- Create a utf8_general_ci database locally.
- Download [composer](https://getcomposer.org/download/).
- Pull project from repository.
- Open the console and move to your project directory.
- Rename `.env.example` file to `.env`inside your project root and fill the database information.
- Run `composer install` or `php composer.phar install` .
- Run `php artisan key:generate`.
- Run `php artisan migrate`.
- Run `php artisan db:seed` to run seeders, if any.
- Run `php artisan ide-helper:generate` to generate helpers for IDE.

## User guide
- Run `php artisan route:list` to see all available routes for the application.
- Run `php artisan serve`.
- Use any REST client for testing, e.g. [Restlet Client](https://chrome.google.com/webstore/detail/restlet-client-rest-api-t/aejoelaoggembcahagimdiliamlcdmfm).
- _api/cities_ - route for city resources.
- _api/sunrise-sunsets_ - route for sunrise/sunset resources.

## Requirements
- [LAMP server](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-16-04)
- PHP > 7.1.4
- [json extension](https://www.php.net/manual/en/book.json.php)
- [Composer](https://getcomposer.org/)