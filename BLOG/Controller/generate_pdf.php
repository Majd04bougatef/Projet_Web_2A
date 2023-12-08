<?php

require_once '../vendor/autoload.php'; // Assurez-vous que le chemin est correct

use TCPDF\TCPDF;

// Exemple de données de blog
$blogTitle = "titre_blog";
$blogSubject = "sujet_blog";
$blogDescription = "Description du Blog";
$blogDate = "2023-01-01"; // Date formatée comme une chaîne, vous devez adapter cela en fonction de votre structure de date

// Créer une instance de TCPDF
$pdf = new TCPDF();

// Définir les métadonnées du PDF
$pdf->SetCreator('Blog PDF');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle($blogTitle);

// Ajouter une page
$pdf->AddPage();

// Ajouter du contenu au PDF
$html = "
    <h1>$blogTitle</h1>
    <p><strong>Sujet:</strong> $blogSubject</p>
    <p><strong>Description:</strong> $blogDescription</p>
    <p><strong>Date:</strong> $blogDate</p>
";

$pdf->writeHTML($html, true, false, true, false, '');

// Enregistrer le PDF localement
$pdfOutput = $pdf->output('blog_file.pdf', 'S');
file_put_contents('blog_file.pdf', $pdfOutput);

// Envoyer le PDF au navigateur pour téléchargement
$pdf->Output('blog.pdf', 'D');
