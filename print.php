<?php
require 'vendor/autoload.php';

use setasign\Fpdi\Tcpdf\Fpdi;

class PDF extends Fpdi
{
    public function Header()
    {
        // Disable default header
    }

    public function Footer()
    {
        // Disable default footer
    }
}

// Path to the pre-made PDF
$templatePdf = 'pdf/files.pdf';
$signatureImage = 'logos/PsjUlBA.png';

// Create new PDF instance
$pdf = new PDF();

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Filled PDF Form');
$pdf->SetSubject('PDF Form Filling');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// Import the first page of the template PDF
$pageCount = $pdf->setSourceFile($templatePdf);
$templateId = $pdf->importPage(1);

// Add a page
$pdf->AddPage();

// Use the imported page
$pdf->useTemplate($templateId, 0, 0, 210, 297);

// Set font and color for the text
$pdf->SetFont('dejavusans', '', 12);
$pdf->SetTextColor(0, 0, 0);

// Define the data to fill in
$data = [
    'enName' => 'John Doe',
    'arName' => 'جون دو',
    'civil_id' => '1234567890',
    'area' => 'Salmiya',
    'date_of_birth' => '01/01/1980',
    'gender' => 'Male',
    'street' => '10',
    'block' => '5',
    'blood_type' => 'O+',
    'nationality' => 'Kuwaiti',
    'house' => '12',
    'visa_type' => 'Work',
    'visa_expiry' => '01/01/2025',
    'flat' => '3',
    'floor' => '2',
    'ave' => '-',
    'fishing_license_expiry' => '01/01/2024',
    'employer' => 'Company Name',
    'phone' => '55512345',
    'sponsor_name' => 'Sponsor Name',
    'sponsor_cid' => '9876543210',
    'new' => '✔',
    'renew' => '✔',
    'lost' => '✔',
    'damage' => '✔',
    'update' => '✔',
    'upgrade' => '✔',
    'pleasureA' => '✔',
    'pleasureB' => '✔',
    'fishingA' => '✔',
    'fishingB' => '✔',
    'cruise' => '✔',
    'government' => '✔',
    'profile' => 'image',
    'licenseNumber' => '123456',
];

// Map the data to coordinates on the PDF
$coordinates = [
    'enName' => [60, 55],
    'arName' => [135, 62],
    'civil_id' => [120, 73],
    'date_of_birth' => [120, 80],
    'gender' => [120, 87],
    'blood_type' => [120, 94],
    'nationality' => [120, 100],
    'visa_type' => [120, 107],
    'visa_expiry' => [120, 113],
    'fishing_license_expiry' => [120, 120],
    'employer' => [120, 127],
    'sponsor_name' => [120, 134],
    'sponsor_cid' => [120, 140],
    'area' => [32, 87],
    'street' => [25, 100],
    'block' => [50, 100],
    'house' => [25, 113],
    'ave' => [50, 113],
    'flat' => [25, 127],
    'floor' => [50, 127],
    'phone' => [32, 140],
    'new' => [60, 157],
    'renew' => [60, 164],
    'lost' => [60, 171],
    'damage' => [60, 178],
    'update' => [60, 185],
    'upgrade' => [60, 192],
    'pleasureA' => [148, 157],
    'pleasureB' => [148, 164],
    'fishingA' => [148, 171],
    'fishingB' => [148, 178],
    'cruise' => [148, 185],
    'government' => [148, 192],
    'profile' => [21, 26],
    'licenseNumber' => [160, 45],
];

// Add the data to the PDF
foreach ($data as $field => $value) {
    if ($field == 'profile') {
        // Add signature image instead of text for the 'employer' field
        $pdf->Image($signatureImage, $coordinates[$field][0], $coordinates[$field][1], 36, 47); // Adjust size (30x15) and position as needed
    } else {
        $pdf->SetXY($coordinates[$field][0], $coordinates[$field][1]);
        $pdf->Cell(0, 10, $value);
    }
}

// Output the modified PDF directly to the browser
$pdf->Output('pdf/filled_template.pdf', 'I');
