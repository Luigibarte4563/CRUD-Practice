<?php
    include "db.php";

    if(isset($_POST['add'])) {
        $name = $_POST['name'];
        $course = $_POST['course'];
        $age = $_POST['age'];

        $sql = "INSERT INTO students (name, course, age)
                VALUES ('$name', '$course', '$age')";

        mysqli_query($conn, $sql);
    }
?>

<form method="POST">
    Name: <input type="text" name="name"><br>
    Course: <input type="text" name="course"><br>
    Age: <input type="number" name="age"><br>
    <button name="add">Add Student</button>
</form>