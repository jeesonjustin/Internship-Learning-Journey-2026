# Task 17 — Student Course & Fee Management System

## Overview

The Student Course & Fee Management System is a Laravel-based web application developed as part of my Full Stack Development Internship.

The project focuses on managing student records, course information, and fee payments through a structured application. It applies Laravel concepts such as MVC architecture, database relationships, CRUD operations, validation, and query-based searching.

## Objectives

* Develop a structured application using Laravel.
* Manage student and course records.
* Record and manage student fee payments.
* Understand relationships between students, courses, and fee records.
* Apply validation to protect data integrity.
* Implement searching and dashboard statistics.
* Improve application organization and maintainability.

## Features

### 1. Student Management

* Manage student information.
* Perform the implemented student CRUD operations.
* Organize student records within the application.
* Apply soft deletion where configured.

### 2. Course Management

* Maintain course information.
* Store course names, durations, and fee amounts.
* Connect course information to relevant student fee records.

### 3. Fee Management

* Record fee payments against students and courses.
* Store payment amounts, dates, and payment methods.
* Maintain individual payment records.
* Support installment-based payments where implemented.

### 4. Search and Filtering

* Search fee records using the implemented search functionality.
* Retrieve relevant records using student and course information.

### 5. Dashboard Statistics

* Display summary statistics for the system.
* Present relevant student, course, or fee information according to the implemented dashboard.

### 6. Validation and Data Integrity

* Validate submitted form data.
* Check required student and course references.
* Validate payment amounts.
* Prevent payment amounts exceeding the applicable course fee where this validation is implemented.

## Technologies Used

* PHP
* Laravel 12
* MySQL / MariaDB
* Blade Templating
* HTML5
* CSS3
* JavaScript, where used
* XAMPP
* phpMyAdmin

## Application Architecture

The application follows Laravel's MVC architecture.

| Component   | Responsibility                                          |
| ----------- | ------------------------------------------------------- |
| Models      | Represent application data and database relationships   |
| Views       | Display the application interface using Blade templates |
| Controllers | Handle requests, validation, and application logic      |
| Routes      | Connect application URLs to the relevant actions        |
| Migrations  | Define and manage database table structures             |

## Database Concepts

The project applies relational database concepts to organize student, course, and fee information.

The main entities include:

* Students
* Courses
* Fee payment records

Student and course references connect payment records to the relevant entities. This helps organize payment history and retrieve related information.

## Fee Payment Logic

The system records fee payments against the relevant student and course.

Where installment payments are supported, each payment should remain an individual record so that previous payments are preserved. The amount paid and remaining balance should be calculated according to the application's actual business rules.

## Screenshots

### Dashboard

![Task 17 Dashboard](../../../Assets/Screenshots/Week-10,11,12,13/Student-Course-Fee-Management/dashboard.png)

### Student Management

![Student Management](../../../Assets/Screenshots/Week-10,11,12,13/Student-Course-Fee-Management/students-list.png)

### Course Management

![Course Management](../../../Assets/Screenshots/Week-10,11,12,13/Student-Course-Fee-Management/courses-list.png)

### Fee Payments

![Fee Payment Management](../../../Assets/Screenshots/Week-10,11,12,13/Student-Course-Fee-Management/fee-payments.png)

## Testing

Document the checks you actually performed, such as:

* Creating and updating student records
* Managing course information
* Recording fee payments
* Validating payment amounts
* Searching fee records
* Checking dashboard statistics
* Verifying related student and course information

## Learning Outcomes

Through this project, I gained practical experience with:

* Building a Laravel application using MVC architecture
* Managing related data through Eloquent models
* Implementing CRUD operations
* Working with database relationships
* Validating form submissions
* Building search functionality
* Managing fee payment records
* Displaying dashboard statistics
* Organizing and documenting a practical web application

## Conclusion

Task 17 builds on the Laravel fundamentals and CRUD concepts developed in earlier tasks. It provides practical experience in combining database relationships, validation, payment records, search functionality, and dashboard information in a structured web application.

---

**Project:** Laravel Student Course & Fee Management System
**Internship Phase:** Weeks 10–13
**Task:** 17

