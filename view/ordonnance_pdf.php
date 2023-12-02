<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

header('Content-Type: text/html; charset=utf-8');
require('../view/fpdf/fpdf.php');
include '../controller/ordonnanceR.php';
require __DIR__ . "/vendor/autoload.php";

$nom_pat = isset($_GET['nomPatient']) ? $_GET['nomPatient'] : '';
$prenom_pat = isset($_GET['prenomPatient']) ? $_GET['prenomPatient'] : '';
$age_pat = isset($_GET['agePatient']) ? $_GET['agePatient'] : '';
$nom_med = isset($_GET['nomMedecin']) ? $_GET['nomMedecin'] : '';
$prenom_med = isset($_GET['prenomMedecin']) ? $_GET['prenomMedecin'] : '';
$date = isset($_GET['date']) ? $_GET['date'] : '';
$id_c = isset($_GET['id_c']) ? $_GET['id_c'] : '';


$medicaments = isset($_GET['nomMedicament']) ? $_GET['nomMedicament'] : [];
$posologies = isset($_GET['posologie']) ? $_GET['posologie'] : [];
$remarques = isset($_GET['remarques']) ? $_GET['remarques'] : [];

ob_clean();

$pdf = new FPDF();
$pdf->AddPage();



$pdf->Image('../image/image pdf/sigleMEd.png', 80, 10, 40);


$pdf->SetXY(10, 10);
$pdf->SetFont('Courier', 'B', 12);
$pdf->SetTextColor(0,0,139); 
$pdf->Cell(0, 10, utf8_decode( 'Docteur '.$nom_med.' '.$prenom_med), 0, 1);


$pdf->SetXY(10, 15);
$pdf->Cell(0, 10,utf8_decode( 'Medecine Générale'), 0, 1);

$pdf->SetXY(10,25);
$pdf->SetTextColor(0,0,139); 
$pdf->SetLineWidth(0.5); 
$pdf->Line(10, $pdf->GetY() + 2, 85, $pdf->GetY() + 2); 

$pdf->SetXY(10,27);
$pdf->SetFont('Courier', 'B', 10);
$pdf->Cell(0, 10, utf8_decode('Diplôme de la Faculté de Marseille'), 0, 1);

$pdf->SetXY(10,35);
$pdf->SetTextColor(0,0,139); 
$pdf->SetLineWidth(0.5); 
$pdf->Line(10, $pdf->GetY() + 2, 85, $pdf->GetY() + 2); 

$pdf->SetXY(150,10);
$pdf->SetFont('Courier', 'B', 10);
$pdf->Cell(0, 10, utf8_decode('16 rue de Marseille'), 0, 1);



$pdf->SetXY(145,60);
$pdf->SetFont('Courier', 'B', 13);
$pdf->Cell(0, 10, utf8_decode('Date : '.$date), 0, 1);


$pdf->SetXY(10,75);
$pdf->SetFont('Courier', '', 13);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0, 10, utf8_decode('Mr/Me/Mme : '.$nom_pat.' '.$prenom_pat), 0, 1);


$pdf->SetXY(10,85);
$pdf->SetFont('Courier', '', 13);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0, 10, utf8_decode('Age : '.$age_pat), 0, 1);
$pdf->Ln(20);

foreach ($medicaments as $i => $medicament) {
    $posologie = $posologies[$i] ?? '';
    $remarque = $remarques[$i] ?? '';

    $pdf->SetFont('Courier', 'B', 13); 
    $pdf->SetTextColor(0, 0, 0);

    $pdf->Cell(30, 10, '- ' . $medicament, 0, 0);

    $pdf->SetX(70); 
    $pdf->SetFont('Courier', '', 13);
    $pdf->Cell(60, 10, $posologie.'/jours', 0, 0); 
    $pdf->Cell(60, 10, '('.$remarque.')', 0, 1); 

    $pdf->Ln(4); 
}

$pdf->SetXY(0,270);
$pdf->SetLineWidth(0.5); 
$pdf->Line(10, $pdf->GetY() + 2, 200, $pdf->GetY() + 2); 




$pdfContent = $pdf->Output(dest: '', name: 'ordonnance_' . $nom_pat . '_' . $prenom_pat .'_'.$date.'.pdf', isUTF8: true);


$pdfFilePath = '../ordonnance/ordonnance_' . $nom_pat . '_' . $prenom_pat .'_'.$date.'.pdf';
$pdf->Output($pdfFilePath, 'F'); 


$ordR = new ordonnancefunction();
$ordR->addOrdonnanceWithPDF($id_c, $pdfFilePath);

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Username = 'bougatefmajd9@gmail.com';
    $mail->Password = 'elqk unie zvws vckh';
    $mail->Port = 587;

    $mail->setFrom("bougatefmajd9@gmail.com");
    $mail->addAddress("bougatefmajd9@gmail.com");

    $mail->isHTML(true);
    $mail->Subject = 'Message de test';
    $mail->Body = 'Ceci est un simple message de test.';
    $mail->AltBody = 'Ceci est un simple message de test en texte brut.';



    $mail->addAttachment($pdfFilePath, 'ordonnance.pdf');

    $mail->send();


    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

exit();

?>
