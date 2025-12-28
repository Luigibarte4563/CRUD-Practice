<?php
include 'db.php';

$id = (int)$_GET['id']; // force integer
mysqli_query($conn, "DELETE FROM students WHERE id=$id");


header("Location: index.php");
?>