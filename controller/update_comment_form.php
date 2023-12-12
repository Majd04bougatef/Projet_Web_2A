// update_comment_form.php

<?php
session_start();
include_once '../Controller/CommentC.php';

$commentC = new CommentC();  

$commentId = $_GET['id_commentaire'];

// Récupérer les données du commentaire
$commentDetails = $commentC->showComment($commentId); 
$eventId = $_GET['id_event'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
      .comment-section {
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }

        .comment {
            margin-bottom: 15px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .comment p {
            margin-bottom: 8px;
            color: #555;
        }

        .comment hr {
            border: 1px solid #ddd;
            margin: 10px 0;
        }

        .comment-form {
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            text-align: center;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: none;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        @keyframes animateBackground {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .ui-btn {
            cursor: pointer;
            border-radius: 5px;
            color: rgb(219, 218, 218);
            border-style: solid;
            background-color: transparent;
            border-color: rgb(219, 218, 218);
            width: 120px;
            height: 40px;
            transition: 0.2s ease;
            text-transform: uppercase;
            border-width: 2px;
            font-weight: 500;
            font-size: 18px;
            letter-spacing: 2px;
        }

        .ui-btn:hover {
            color: rgb(247, 247, 247);
            background-color: rgb(202, 25, 25);
            border-color: rgb(202, 25, 25);
            text-shadow: 0 0 50px white, 0 0 20px white, 0 0 15px white;
            box-shadow: 0 0 50px rgb(202, 25, 25), 0 0 30px rgb(202, 25, 25),
                0 0 60px rgb(202, 25, 25), 0 0 120px rgb(202, 25, 25);
            font-size: 20px;
            width: 130px;
            height: 50px;
            letter-spacing: 3px;
        }

        .ui-btn:active {
            width: 115px;
            height: 38px;
            letter-spacing: 0px;
        }

        button {
            font-size: 17px;
            padding: 0.5em 2em;
            border: transparent;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
            background: dodgerblue;
            color: white;
            border-radius: 4px;
        }

        button:hover {
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(30, 144, 255, 1) 0%, rgba(0, 212, 255, 1) 100%);
        }

        button:active {
            transform: translate(0em, 0.2em);
        }
    </style>
</head>

<body>
    <form action="update_comment.php" method="post">
        <input type="hidden" name="comment_id" value="<?= $commentId ?>">
        <input type="hidden" name="event_id" value="<?= $eventId ?>">
        <textarea name="updated_content" rows="4" cols="50"><?= $commentDetails->getContenu() ?></textarea>
        <input type="submit" value="Mettre à jour le commentaire">
    </form>
</body>

</html>
