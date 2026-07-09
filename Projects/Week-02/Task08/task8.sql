DAY-8 Task-Database Queries

show database;
USE internship_db;
show tables;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    age INT,
    email VARCHAR(100),
    course VARCHAR(100)
);

INSERT INTO students (name, age, email, course) VALUES 
('john', 25,'john@gmail.com', 'MCA'),
('Alex',22,'alex@gmail.com','MCA'),
('Jeeson',24,'jeeson@gmail.com','MCA'),
('Rahul',21,'rahul@gmail.com','BSc'),
('Anu',19,'anu@gmail.com','BCA'),
('Sneha',23,'sneha@gmail.com','MBA'),
('Kevin',22,'kevin@gmail.com','MCA'),
('Riya',20,'riya@gmail.com','BCom'),
('Arjun',25,'arjun@gmail.com','MBA'),
('Meera',21,'meera@gmail.com','BCA');

SELECT * FROM students;

SELECT * FROM students WHERE course='MCA';

SELECT * FROM students WHERE age>20;

UPDATE students set email='johnyy@gmail.com' WHERE id=1;

DELETE FROM students WHERE id=2;
