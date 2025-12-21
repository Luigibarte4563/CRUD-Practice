CREATE DATABASE crud_db;
USE crud_db;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    course VARCHAR(50),
    age INT
);
