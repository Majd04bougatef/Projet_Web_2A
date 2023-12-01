<?php

session_start();

include_once '../config.php';
include_once '../Controller/CommentC.php';

$commentC = new CommentC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $contenu = $_POST["contenu"];
    $date_commentaire = date("Y-m-d H:i:s"); 

    
    $id_e = $_POST["id_e"];

    
    $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null;

    
    if ($id_user) {
      
        $comment = new Comment(null, $contenu, $date_commentaire, $id_e, $id_user);

        
        $result = $commentC->addComment($comment);

        if ($result === true) {
            
            header('Location: event_details.php?id_event=' . $id_e);
            exit();
        } else {
           
            echo "Error adding comment: " . $result;
        }
    } else {
        
        echo "User ID not available.";
    }
} else {
    
    echo "Invalid request method.";
}
?>
