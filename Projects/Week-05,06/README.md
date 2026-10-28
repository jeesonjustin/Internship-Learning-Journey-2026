# Weeks 05–06 — Laravel Development

## Overview

These two weeks focus on applying Laravel fundamentals through practical development tasks. The goal is to strengthen my understanding of Laravel's application structure and build on the concepts explored during Week 04.

## Task 15 — Laravel Profile Page

Develop a profile page using Laravel routing, controllers, and Blade templating.

**Topics explored:**

* Laravel routing
* Controller-based request handling
* Blade views
* MVC architecture
* Profile information display

📂 [View Task 15 — Laravel Profile Page](./Task15-Profile-Page/README.md)

## Learning Focus

* Organizing Laravel application code
* Connecting routes to controllers
* Rendering views with Blade
* Improving code structure and readability
* Applying Laravel fundamentals through practical work

## Documentation

The task implementation and learning outcomes are documented in the individual task README.

---

## Project Structure for Laravel Development which includes Task 15,16 and 17

The application follows the Laravel project structure, separating controllers, models, database migrations, routes, and Blade views to keep the code organized and maintainable.

```text
InternLaravel/
│
├── app/
│   ├── Console/
│   │   └── Kernel.php
│   │
│   ├── Exceptions/
│   │   └── Handler.php
│   │
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Controller.php
│   │   │   ├── CourseController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── FeeController.php
│   │   │   ├── ProfileController.php
│   │   │   ├── StudentController.php
│   │   │   └── StudentRegistrationController.php
│   │   │
│   │   ├── Middleware/
│   │   │   ├── Authenticate.php
│   │   │   ├── EncryptCookies.php
│   │   │   ├── PreventRequestsDuringMaintenance.php
│   │   │   ├── RedirectIfAuthenticated.php
│   │   │   ├── TrimStrings.php
│   │   │   ├── TrustHosts.php
│   │   │   ├── TrustProxies.php
│   │   │   └── VerifyCsrfToken.php
│   │   │
│   │   └── Kernel.php
│   │
│   ├── Models/
│   │   ├── Fee.php
│   │   ├── Student.php
│   │   ├── StudentRegistration.php
│   │   └── User.php
│   │
│   └── Providers/
│       ├── AppServiceProvider.php
│       ├── AuthServiceProvider.php
│       ├── BroadcastServiceProvider.php
│       ├── EventServiceProvider.php
│       └── RouteServiceProvider.php
│
├── database/
│   ├── migrations/
│   │   ├── 2026_09_10_091328_create_student_registrations_table.php
│   │   ├── 2026_09_17_095459_create_students_table.php
│   │   ├── 2026_09_17_095740_create_courses_table.php
│   │   ├── 2026_09_17_095754_create_fees_table.php
│   │   └── 2026_10_14_191822_add_unique_student_course_to_fees_table.php
│   │
│   ├── seeders/
│   │   └── DatabaseSeeder.php
│   │
│   └── .gitignore
│
├── resources/
│   ├── css/
│   │   └── app.css
│   │
│   ├── js/
│   │   ├── app.js
│   │   └── bootstrap.js
│   │
│   ├── lang/
│   │   └── en/
│   │       ├── auth.php
│   │       ├── pagination.php
│   │       ├── passwords.php
│   │       └── validation.php
│   │
│   └── views/
│       ├── dashboard.blade.php
│       ├── layout_test_t17.blade.php
│       ├── profile.blade.php
│       ├── welcome.blade.php
│       │
│       ├── courses/
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── index.blade.php
│       │
│       ├── fees/
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── index.blade.php
│       │
│       ├── layouts/
│       │   └── app_t17.blade.php
│       │
│       ├── students/
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── index.blade.php
│       │
│       └── student_registrations/
│           ├── create.blade.php
│           └── edit.blade.php
│
├── routes/
│   ├── api.php
│   ├── channels.php
│   ├── console.php
│   └── web.php
│
├── public/
│   ├── css/
│   │   └── style_t17.css
│   ├── .htaccess
│   ├── favicon.ico
│   ├── index.php
│   ├── robots.txt
│   └── web.config
│
├── tests/
│   ├── Feature/
│   │   └── ExampleTest.php
│   ├── Unit/
│   │   └── ExampleTest.php
│   ├── CreatesApplication.php
│   └── TestCase.php
│
├── .editorconfig
├── .env.example
├── .gitattributes
├── .gitignore
├── .styleci.yml
├── artisan
├── composer.json
├── composer.lock
├── package.json
├── phpunit.xml
├── README.md
├── server.php
└── webpack.mix.js
```

### Main Directory Responsibilities

| Directory/File              | Purpose                                              |
| --------------------------- | ---------------------------------------------------- |
| `app/Http/Controllers/`     | Handles application requests and business logic      |
| `app/Models/`               | Represents database entities and model relationships |
| `database/migrations/`      | Defines database table structures and schema changes |
| `resources/views/students/` | Contains student management Blade views              |
| `resources/views/courses/`  | Contains course management Blade views               |
| `resources/views/fees/`     | Contains fee management Blade views                  |
| `resources/views/layouts/`  | Contains the shared Task 17 layout                   |
| `routes/web.php`            | Defines web application routes                       |
| `public/css/style_t17.css`  | Contains the Task 17 stylesheet                      |
| `tests/`                    | Contains the project's test files                    |

*Note: The structure above documents the files found in the local project. It excludes the `vendor/` dependencies and does not list any files that were not shown in the supplied terminal output.*


