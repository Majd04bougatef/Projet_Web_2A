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

        table {
            border-collapse: collapse; /* Remove default table spacing */
        }

        th {
            padding: 10px;
            text-align: center;
        }

        button {
            width: 150px;
            height: 50px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            background: blue;
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            transition:  0.3s;
        }

        button:hover {
            background: #1a5099; /* Darker shade of blue on hover */
        }
    </style>
</head>
<body>
    <table>
        <th><a href="../view/update.php"><button> update tous les patients</button></a></th>
        <th><a href="../view/updatep.php"><button> update patient spécifique</button></a></th>
        <th><a href="../view/updatem.php"><button> update doctor spécifique</button></a></th>
    </table>  
</body>
</html>
