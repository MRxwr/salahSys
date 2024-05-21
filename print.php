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
$pdf->SetFont('helvetica', '', 12);
$pdf->SetTextColor(0, 0, 0);

// Define the data to fill in
$data = [
    'full_name' => 'John Doe',
    'civil_id' => '1234567890',
    'area' => 'Salmiya',
    'date_of_birth' => '01/01/1980',
    'gender' => 'Male',
    'street' => 'Street Name',
    'block' => 'Block 5',
    'blood_type' => 'O+',
    'nationality' => 'Kuwaiti',
    'house' => 'House 12',
    'visa_type' => 'Work',
    'visa_expiry' => '01/01/2025',
    'flat' => 'Flat 3',
    'floor' => '2',
    'fishing_license_expiry' => '01/01/2024',
    'employer' => 'Company Name',
    'phone' => '55512345',
    'sponsor_name' => 'Sponsor Name',
    'sponsor_cid' => '9876543210'
];

// Map the data to coordinates on the PDF
$coordinates = [
    'full_name' => [60, 55],
    'civil_id' => [120, 73],
    'date_of_birth' => [120, 80],
    'gender' => [120, 87],
    'blood_type' => [120, 94],
    'nationality' => [120, 101],
    'visa_type' => [120, 108],
    'visa_expiry' => [120, 115],
    'fishing_license_expiry' => [120, 122],
    'employer' => [120, 129],
    'sponsor_name' => [120, 136],
    'sponsor_cid' => [120, 143],
    'area' => [50, 70],
    'street' => [50, 100],
    'block' => [50, 110],
    'house' => [50, 140],
    'flat' => [50, 170],
    'floor' => [50, 180],
    'phone' => [50, 210],
];

// Add the data to the PDF
foreach ($data as $field => $value) {
    $pdf->SetXY($coordinates[$field][0], $coordinates[$field][1]);
    $pdf->Cell(0, 10, $value);
}

// Output the modified PDF directly to the browser
$pdf->Output('pdf/filled_template.pdf', 'I');
