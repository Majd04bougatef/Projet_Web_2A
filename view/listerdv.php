<?php
include '../controller/rdvC.php';
$rendezvous = new rdvC();
$list = $rendezvous->show();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../source/menu_consultation.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <title>Document</title>
    <style>
body {
    background-color: #3498db;
    display: flex;
    justify-content: center;
    align-items: center;
    height: auto; /* This is important for vertical centering */
    margin: 0;
}


table {
    width: 50%;
    margin-top: 20px;
    border-collapse: collapse;
    background-color: white;
}

th, td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #3498db;
    color: white;
}

tr:hover {
    background-color: #f5f5f5;
}

</style>
</head>
<body>
  
<table>
  
    <tr>
        <th>ID</th>
        <th>Date</th>
        <th>delete</th>
        <th>update </th>
    </tr>


    <?php foreach ($list as $med){ ?>
        <tr>
            <td><?php echo $med['id_rdv']; ?></td>
            <td><?php echo $med['date_rdv']; ?></td>
            <td>
                <form action="delete.php" method="GET">
                    <input type="hidden" name="id_rdv" value="<?php echo $med['id_rdv']; ?>">
                    
                    <a href="delete.php"><button type="submit" onclick="return confirmDelete();">Delete</button></a>
                </form>
            </td>
            <td>
                <form action="update2.php" method="GET">
                    <input type="hidden" name="id_rdv" value="<?php echo $med['id_rdv']; ?>">
                    
                    <a href="update2.php"><button type="submit">update</button></a>
                </form>
            </td>
        </tr>
    <?php }?>

</table>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this record?");
    }
</script>
</body>
</html>
