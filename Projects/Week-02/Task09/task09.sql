DAY-9 Task-Database Operations (Employees Table)

CREATE table employees (id int AUTO_INCREMENT PRIMARY KEY, name varchar(100), 
age int, email varchar(100), department varchar(100), salary int);

INSERT into employees (name, age, email, department, salary) values
("jeeson",25,"jees@gmail.com","IT",20000),
("jack",23,"jack@gmail.com","Sales",15000),
("james",22,"jamess@gmail.com","Marketing",30000),
("Ben",25,"ben@gmail.com","IT",25000),
("jency",26,"jency@gmail.com","HR",40000),
("Sneha",25,"sneha@gmail.com","IT",20000),
("jenson",25,"jenson@gmail.com","Marketing",22000),
("Akhil",30,"akhil@gmail.com","Finance",45000),
("Anu",28,"anu@gmail.com","HR",35000),
("Rahul",32,"rahul@gmail.com","Sales",50000);

select * from employees;

select * from employees where department="IT";

select * from employees where age>30;

SELECT * FROM employees ORDER BY salary DESC;

SELECT COUNT(*) from employees;

select avg(salary) from employees;

select max(salary) from employees;

update employees set email="jeeson@gmail.com" where id=1;

update employees set salary=20000 WHERE id=2;

DELETE FROM employees where id=9;
