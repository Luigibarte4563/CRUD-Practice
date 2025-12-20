<?php
include "db.php";
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $course = $_POST['course'];
    $age = $_POST['age'];

    mysqli_query($conn,
        "UPDATE students SET 
         name='$name', course='$course', age='$age'
         WHERE id=$id");

    header("Location: index.php");
}
?>

<form method="POST">
    Name: <input value="<?= $row['name'] ?>" name="name"><br>
    Course: <input value="<?= $row['course'] ?>" name="course"><br>
    Age: <input value="<?= $row['age'] ?>" name="age"><br>
    <button name="update">Update</button>
</form>
