<?php
include '../controller/rdvC.php';
$rendezvous = new rdvC();

if (isset($_GET['id_rdv'])){
    $result = $rendezvous->show_update($_GET['id_rdv']);
    $list = $result->fetch(PDO::FETCH_ASSOC); // Fetch the data as an associative array
}
else{
    echo 'zefz';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      

        form {
            max-width: 400px; /* Set a maximum width for the form */
            margin: 20px auto; /* Center the form horizontally */
            padding: 20px;
            background-color: #fff; /* Set a background color for the form */
            border-radius: 8px; /* Add rounded corners to the form */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
        }

        h6 {
            color: #333; /* Set the text color for headings */
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
        }

        input[type="submit"] {
            background-color: #3498db; /* Set the background color for the submit button */
            color: #fff; /* Set the text color for the submit button */
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9; /* Change the background color on hover */
        }
    </style>
</head>
<body>
    <form action="../view/update3.php" method="POST">
        <h6>nom</h6>
        <input type="text" value="<?php echo $list['nom']; ?>" name="nom">
        <h6>prenom</h6>
        <input type="text" value="<?php echo $list['prenom']; ?>" name="prenom">
        <h6>rdv</h6>
        <input type="date" value="<?php echo $list['date_rdv']; ?>" name="date_rdv">
        <!-- Adjust the following lines based on your actual database fields -->
        <h6>drdv</h6>
        <input type="text" value="<?php echo $list['deb_rdv']; ?>" name="deb_rdv">
        <h6>frdv</h6>
        <input type="text" value="<?php echo $list['fin_rdv']; ?>" name="fin_rdv">
        <input type="hidden" value="<?php echo $list['id_rdv']; ?>" name="id_rdv">
        <input type="submit" value="Update">
    </form>
</body>
</html>

