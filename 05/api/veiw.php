<?php 
$sql="SELECT * FROM files";
$stmt=$conn->prepare($sql);
$stmt->execute();
$results=$stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css" />

</head>
<body>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>uploaded at</th>
            </tr>
        </thead>
        <tbody>
<?php  foreach($results as $file){
    
 ?>

<tr>
    <td> <?php echo $file["origname"] ?> </td>
        <td> <?php echo $file["category"] ?> </td>

            <td> <?php echo $file["uploaded_at"] ?> </td>

</tr>

<?php }?>

        </tbody>
    </table>

    <script>
    </script>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>
<script>
    let table = new DataTable('#myTable');
</script>
</html>