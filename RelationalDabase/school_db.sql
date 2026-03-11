CREATE TABLE subjects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subject_name VARCHAR(100)
);

CREATE TABLE teachers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    teacher_name VARCHAR(100),
    subject_id INT,
    FOREIGN KEY (subject_id) REFERENCES subjects(id)
);

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100),
    teacher_id INT,
    FOREIGN KEY (teacher_id) REFERENCES teachers(id)
);

/*To see the specific student and see their teacher and subject*/
SELECT 
students.student_name,
teachers.teacher_name,
subjects.subject_name
FROM students
JOIN teachers ON students.teacher_id = teachers.id
JOIN subjects ON teachers.subject_id = subjects.id;