<?php
include 'db.php';

if (!isset($_GET['id'])) {
    die("ID not specified.");
}

$id = (int) $_GET['id'];

$stmt = $conn->prepare("DELETE FROM items WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header("Location: index.php");
exit();
?>
