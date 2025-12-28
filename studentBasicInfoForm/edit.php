<?php
include 'db.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    mysqli_query($conn,
        "UPDATE students
        SET name='$name', email='$email', course='$course'
        WHERE id=$id"
);


    header("Location: index.php");
}
?>

<form method="POST">    
    <h2>Edit Student</h2>
    Name: <input type="text" name="name" value="<?= $row['name'] ?>"><br><br>
    Email: <input type="email" name="email" value="<?= $row['email'] ?>"><br><br>
    Course: <input type="text" name="course" value="<?= $row['course'] ?>"><br><br>
    <button name="update">Update</button>
</form>