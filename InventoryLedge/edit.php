<?php
include 'db.php';

if (!isset($_GET['id'])) {
    die("ID not specified.");
}

$id = (int) $_GET['id'];

// Fetch current item
$stmt = $conn->prepare("SELECT * FROM items WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$item = $result->fetch_assoc();
$stmt->close();

if (!$item) {
    die("Item not found.");
}

// Handle update
if(isset($_POST['update'])) {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("UPDATE items SET name=?, quantity=? WHERE id=?");
    $stmt->bind_param("sii", $name, $quantity, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit();
}
?>

<h2>Edit Product</h2>

<form method="POST">
    Product Name: <input type="text" name="name" value="<?= htmlspecialchars($item['name']) ?>" required><br><br>
    Quantity: <input type="number" name="quantity" value="<?= $item['quantity'] ?>" required><br><br>
    <button type="submit" name="update">Update Product</button>
</form>
