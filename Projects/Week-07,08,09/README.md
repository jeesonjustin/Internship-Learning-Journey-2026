# Weeks 07–09 — Laravel Development

# Task 16 – Laravel Student Registration CRUD System

## Project Overview

The Student Registration CRUD System is a Laravel-based application developed to manage student registration records.

This task focuses on implementing CRUD (Create, Read, Update, Delete) operations using Laravel controllers, Eloquent models, database migrations, routing, and Blade templates.

## Objectives

* Understand CRUD operations in Laravel.
* Work with Eloquent ORM.
* Create and use database migrations.
* Handle form submissions.
* Implement form validation.
* Display database records dynamically.
* Edit and delete student records.

## Features

### Student Registration

* Register students using a form.
* Capture student details.
* Validate submitted information.
* Store records in the database.

### Student Listing

* Retrieve student records.
* Display registered students.
* Organize student information in a table.

### Student Editing

* Load existing student information.
* Update student records.
* Save modified details.

### Student Deletion

* Delete student registration records.

## Technologies Used

* PHP
* Laravel
* MySQL
* Eloquent ORM
* Blade Templates
* HTML
* CSS

## Project Folder Structure

```text
Task16-Student-Registration-CRUD/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── StudentRegistrationController.php
│   │
│   └── Models/
│       └── StudentRegistration.php
│
├── database/
│   └── migrations/
│       └── 2026_09_10_091328_create_student_registrations_table.php
│
├── resources/
│   └── views/
│       └── student_registrations/
│           ├── create.blade.php
│           └── edit.blade.php
│
├── routes/
│   └── web.php
│
└── README.md
```

## Implementation

### 1. Database Migration

Created a database migration to define the student registration table structure.

### 2. Eloquent Model

Created `StudentRegistration.php` to interact with student registration records using Laravel Eloquent ORM.

### 3. Controller

Created `StudentRegistrationController.php` to handle student registration, listing, editing, updating, and deletion operations.

### 4. Blade Templates

Created Blade templates for registration and editing forms.

### 5. Routing

Configured Laravel routes to connect user requests with the appropriate controller methods.

### 6. Validation

Implemented server-side validation to ensure submitted student information meets the required conditions.

## CRUD Workflow

```text
User
  |
  v
Registration Form
  |
  v
Laravel Route
  |
  v
StudentRegistrationController
  |
  v
Validation
  |
  v
StudentRegistration Model
  |
  v
MySQL Database
  |
  v
Response / Blade View
```

## Learning Outcomes

Through this task, I gained experience with:

* Laravel CRUD operations.
* Eloquent ORM and database interactions.
* Database migrations.
* Request validation.
* Handling HTML forms.
* Blade templates.
* Laravel MVC architecture.

## Task Status

**Completed**

📂 [View Task 16 - Student Registration & CRUD Operations](./Task16-Student-Registration-CRUD/README.md)

Part of my 6-month Full Stack Development Internship Learning Journey.

