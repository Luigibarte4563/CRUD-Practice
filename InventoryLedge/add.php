<?php
include 'db.php';

if(isset($_POST['add'])) {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("INSERT INTO items (name, quantity) VALUES (?, ?)");
    $stmt->bind_param("si", $name, $quantity);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit();
}
?>

<h2>Add New Product</h2>

<form method="POST">
    Product Name: <input type="text" name="name" required><br><br>
    Quantity: <input type="number" name="quantity" required><br><br>
    <button type="submit" name="add">Add Product</button>
</form>
