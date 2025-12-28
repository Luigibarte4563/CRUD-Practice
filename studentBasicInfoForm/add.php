<?php
include 'db.php';

if(isset($_POST['save'])) {
    $id = $_POST['id'];
    $name = $_POST['name']; 
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (id, name, email, course)
            VALUES ('$id', '$name', '$email', '$course')";

    mysqli_query($conn, $sql);
    header("Location: index.php");
}
?>

<form method="POST">
    <h2>Add Student</h2>
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="text" name="email" required><br><br>
    Course: <input type="text" name="course" required><br><br>
    <button name="save">Save</button>
</form>