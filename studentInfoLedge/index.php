<?php
include "db.php";
$result = mysqli_query($conn, "SELECT * FROM students");
?>

<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Course</th>
    <th>Age</th>
    <th>Action</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['course'] ?></td>
    <td><?= $row['age'] ?></td>
    <td>
        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $row['id'] ?>">Delete</a>
    </td>
</tr>
<?php } ?>
</table>
