# Laravel Basics — Learning Notes

## 1. Introduction to Laravel

Laravel is a PHP web application framework that provides tools and conventions for building structured web applications.

It helps organize application logic, manage routes, interact with databases, and render dynamic views.

## 2. Laravel Project Structure

A Laravel project contains folders for application logic, routes, views, configuration, database migrations, and other resources.

Important locations include:

* `app/` — Application classes, including controllers and models.
* `routes/` — Route definitions.
* `resources/views/` — Blade view templates.
* `database/migrations/` — Database structure changes.
* `public/` — Publicly accessible application assets and entry point.
* `config/` — Application configuration files.

## 3. MVC Architecture

MVC stands for Model–View–Controller.

* **Model:** Represents and manages application data and related database interactions.
* **View:** Displays the user interface.
* **Controller:** Handles application logic and coordinates requests, data, and responses.

### Basic Request Flow

1. A user visits a URL.
2. Laravel matches the request to a route.
3. The route invokes a controller or another defined action.
4. The application processes the request.
5. A view or another response is returned to the user.

## 4. Routing

Routes define how an application responds to incoming requests.

Laravel web routes are commonly defined in `routes/web.php`.

Example:

```php
use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return 'Hello from Laravel';
});
```

This defines a GET route that returns a simple response.

## 5. Controllers

Controllers help organize request-handling logic outside route definitions.

Example Artisan command:

```bash
php artisan make:controller ProfileController
```

This command generates a controller class that can be used to handle related application requests.

## 6. Blade Templating

Blade is Laravel's templating engine for creating dynamic views.

Blade files commonly use the `.blade.php` extension and are stored in `resources/views/`.

Example:

```blade
<h1>Welcome to Laravel</h1>
<p>Hello, {{ $name }}</p>
```

The `{{ }}` syntax displays an escaped value in a Blade template.

## 7. Artisan CLI

Artisan is Laravel's command-line interface.

Useful commands include:

```bash
php artisan
php artisan route:list
php artisan make:controller ProfileController
php artisan serve
```

These commands help inspect available commands, view registered routes, generate a controller, and run the local development server.

## 8. Learning Summary

The topics covered in these notes provide an introduction to Laravel's structure and request flow. They form the foundation for learning database operations, validation, relationships, and more advanced application development.

---

*Add further explanations and examples as these concepts are practised during the internship.*

