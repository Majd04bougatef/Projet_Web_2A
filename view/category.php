
<?php
include_once '../controller/catC.php';

$idcat = $_POST["idcat"] ?? "";
$catrdv = $_POST["catrdv"] ?? "";

$catController = new catC();

if (isset($idcat) && isset($catrdv)) {
    $category = new categorie(NULL, $catrdv);
    $catController->addcat($idcat, $category->getCatRdv());
} else {
    echo "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      
      body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Make sure the body takes up the full viewport height */
            margin: 0; /* Remove default margin */
            background-image: url('../source/bgr.jpg'); 
            background-size: cover;
            background-position: center;
        }

        form {
            max-width: 600px; /* Set a maximum width for the form */
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
    <form action="" method="POST">
        <h6>idcat</h6>
        <input type="text" value="" name="idcat">
        <h6>catrdv</h6> 
        <input type="text" value="" name="catrdv">
        <input type="submit" value="Add Category">
    </form>
</body>
</html>
