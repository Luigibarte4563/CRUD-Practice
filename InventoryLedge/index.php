<?php
include 'db.php';

// Count total items
$result = $conn->query("SELECT COUNT(id) AS total FROM items");
$row = $result->fetch_assoc();
$totalItems = $row['total'];

// Fetch all items
$result = $conn->query("SELECT * FROM items");
?>

<h3>Total Products: <?= $totalItems ?></h3>

<a href="add.php">Add New Product</a><br><br>

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Quantity</th>
    <th>Action</th>
</tr>

<?php while ($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= htmlspecialchars($row['name']) ?></td>
    <td><?= $row['quantity'] ?></td>
    <td>
        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
    </td>
</tr>
<?php } ?>
</table>
