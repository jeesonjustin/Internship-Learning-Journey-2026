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

## Task 15 — Applying Laravel Fundamentals

### Overview

Task 15 applies the Laravel fundamentals explored in Week 04 through the development of a Profile Page.

### Concepts Applied

* **Routing:** Defining the URL used to access the page.
* **Controllers:** Handling the request through a controller.
* **Blade Templating:** Rendering the profile page interface.
* **MVC Architecture:** Separating request handling from presentation.

### Related Project

[Task 15 — Laravel Profile Page](../../Projects/Week-05,06/Task15-Profile-Page/README.md)

### Reflection

This task helps connect the theoretical concepts of Laravel routing, controllers, and Blade views with practical application development.

## Laravel Task 16 — Learning Notes

### Overview

These notes document the Laravel concepts explored while working on Task 16 during Weeks 07–09 of my Full Stack Development Internship.

### Concepts Applied

Document the concepts used in the implementation, such as:

* Routing and controllers
* Blade templates
* Models and database interactions, if applicable
* Form handling and validation, if applicable
* Application logic and code organization
* Testing and debugging

### Implementation Notes

Record important implementation decisions, code patterns, and solutions to problems encountered while working on the task.

### Challenges and Solutions

Document any issues you encountered and how you resolved them.

### Key Takeaways

Summarize the new concepts and skills gained from completing Task 16.

### Related Project

[Task 16 — Student Registration & CRUD Operations](../../Projects/Week-07,08,09/Task16-Student-Registration-CRUD/README.md)

### Learning Notes - (Add-On)

[Task 16 — Laravel Learning Notes](../../Learning-Notes/Laravel/Task16-Laravel-task2-notes.txt)

---

## Laravel Task 17 — Student Course & Fee Management System

### Overview

These notes document the Laravel concepts and development practices explored while building the Student Course & Fee Management System during Weeks 10–13.

### 1. Eloquent Models

Laravel Eloquent provides an object-oriented way to interact with database records through models.

In this project, models represent the student, course, and fee payment entities.

### 2. Database Relationships

The project uses related records to associate fee payments with students and courses.

Document the relationships defined in the actual models, including their types and how they are used by the application.

### 3. CRUD Operations

CRUD stands for Create, Read, Update, and Delete.

The project applies the relevant CRUD operations to the student, course, and fee records according to its implemented functionality.

### 4. Validation

Laravel validation helps check submitted data before it is processed.

Record the validation rules used for student references, course references, payment amounts, and any other fields in the project.

### 5. Searching

Search functionality helps users retrieve relevant records based on the search criteria supported by the application.

Document how the search is implemented and which related fields can be searched.

### 6. Fee Payments and Installments

Fee payment records should preserve the payment history required by the application.

Where installment payments are supported, document how individual payments are stored and how the total paid amount and remaining balance are calculated.

### 7. Dashboard Statistics

Dashboard statistics summarize relevant application data.

Document the actual statistics displayed and explain how the application retrieves or calculates them.

### 8. Challenges and Solutions

Record the issues encountered during development and the steps used to resolve them.

### 9. Learning Outcomes

Task 17 strengthened my understanding of Laravel models, database relationships, CRUD operations, validation, search, and the development of a database-driven application.

### Related Project

[Task 17 — Student Course & Fee Management System](../../Projects/Week-10,11,12,13/Task17-Student-Course-Fee-Management/README.md)

---

*These notes should be expanded with actual code examples, validation rules, relationship definitions, and lessons learned from the implementation.*
