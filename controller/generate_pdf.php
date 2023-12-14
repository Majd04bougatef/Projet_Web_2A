<?php
include 'config.php'; // Add a semicolon at the end of this line
include '../fpdf/fpdf.php';

function generatePDF( $id_b, $titre_blog, $sujet_blog, $desc_blog, $image, $pdo) {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, 'Facture Details');

    // Fetch user information based on id_r
    $userStmt = $pdo->prepare("SELECT * FROM blog");
    $userStmt->execute([$id_b]);
    $userInfo = $userStmt->fetch(PDO::FETCH_ASSOC);

    // Add facture details to the PDF
    $pdf->Ln(); // Move to the next line
    $pdf->Cell(40, 10, 'titre: ' . $titre_blog);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'sujet du blog: ' . $sujet_blog);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Description: ' . $desc_blog);

    // Add user information to the PDF if found
    
        $pdf->Ln();
        $pdf->Cell(40, 10, 'facture of pharmacy:');
        $pdf->Ln();
        $imagePath = '../uploads/' . $userInfo['image']; // Adjust the path based on your project structure
        $pdf->Image($image, null, null, 80); // You may need to adjust width and height accordingly

    // Save the PDF file (adjust the path based on your project structure)
    $pdf->Output('../pdf/blog', 'F');
}
?>
