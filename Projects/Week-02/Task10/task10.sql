Day 10 Task – MySQL Database Operations (Joins)

use internship_db;
show TABLES;

CREATE TABLE departments(dept_id int PRIMARY KEY, dept_name varchar(30));

DESC departments;

CREATE TABLE employees2 (emp_id int AUTO_INCREMENT PRIMARY KEY, name varchar(100), 
age int, email varchar(100), salary decimal(10,2), dept_id int, FOREIGN KEY (dept_id)
REFERENCES departments(dept_id));

INSERT into departments (dept_id, dept_name) values
(1,'IT'),
(2,'HR'),
(3,'Finance'),
(4,'Sales'),
(5,'Marketing');

SELECT * FROM departments;

INSERT INTO employees2 (name,age,email,salary,dept_id) values
('John',25,'john@gmail.com',55000,1),
('Alex',28,'alex@gmail.com',62000,1),
('Maria',26,'maria@gmail.com',45000,2),
('David',32,'david@gmail.com',70000,3),
('Sophia',27,'sophia@gmail.com',52000,4),
('Kevin',29,'kevin@gmail.com',48000,5),
('Emma',30,'emma@gmail.com',90000,3),
('Daniel',24,'daniel@gmail.com',39000,2),
('Olivia',31,'olivia@gmail.com',61000,1),
('James',35,'james@gmail.com',80000,4);

SELECT * FROM employees2;

SELECT employees2.emp_id, 
employees2.name, 
departments.dept_name 
FROM employees2 INNER JOIN departments ON
employees2.dept_id = departments.dept_id;

select employees2.name, departments.dept_name 
FROM employees2 INNER JOIN departments
ON employees2.dept_id = departments.dept_id 
WHERE departments.dept_name='IT';

select employees2.name, employees2.salary, departments.dept_name
FROM employees2 INNER JOIN departments
ON employees2.dept_id = departments.dept_id 
WHERE employees2.salary>50000;

select employees2.name, employees2.salary, departments.dept_name 
FROM employees2 INNER JOIN departments
ON employees2.dept_id = departments.dept_id 
ORDER BY employees2.salary DESC;

select employees2.name, employees2.salary, departments.dept_name 
FROM employees2 INNER JOIN departments
ON employees2.dept_id = departments.dept_id 
WHERE departments.dept_name IN ('HR','Finance');

SELECT employees2.name, departments.dept_name
FROM employees2
LEFT JOIN departments
ON employees2.dept_id = departments.dept_id;

SELECT employees2.name, departments.dept_name
FROM employees2
RIGHT JOIN departments
ON employees2.dept_id = departments.dept_id;

SELECT
d.dept_name,
COUNT(e.emp_id) AS TotalEmployees
FROM departments d
LEFT JOIN employees2 e
ON d.dept_id = e.dept_id
GROUP BY d.dept_name;

SELECT
d.dept_name,
AVG(e.salary) AS AverageSalary
FROM departments d
LEFT JOIN employees2 e
ON d.dept_id=e.dept_id
GROUP BY d.dept_name;


SELECT
d.dept_name,
MAX(e.salary) AS HighestSalary
FROM departments d
LEFT JOIN employees2 e
ON d.dept_id=e.dept_id
GROUP BY d.dept_name;

UPDATE employees2 SET dept_id=1 WHERE employee_id=5;

UPDATE employees2 SET salary=85000 WHERE emp_id=7;

DELETE FROM employees2 WHERE emp_id=10;

