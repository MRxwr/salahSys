<?php
require 'vendor/autoload.php';

use setasign\Fpdi\TcpdfFpdi;

// Create a custom class that extends TCPDF and FPDI
class PDF extends TcpdfFpdi
{
    public function Header()
    {
        // Do nothing to use the existing PDF header
    }

    public function Footer()
    {
        // Do nothing to use the existing PDF footer
    }
}

// Path to the pre-made PDF
$templatePdf = 'file.pdf';

// Create new FPDI instance
$pdf = new PDF();

// Add a page from the pre-made PDF
$pageCount = $pdf->setSourceFile($templatePdf);
$tplId = $pdf->importPage(1);
$pdf->AddPage();
$pdf->useTemplate($tplId, ['adjustPageSize' => true]);

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
    'full_name' => [50, 50],
    'civil_id' => [50, 60],
    'area' => [50, 70],
    'date_of_birth' => [50, 80],
    'gender' => [50, 90],
    'street' => [50, 100],
    'block' => [50, 110],
    'blood_type' => [50, 120],
    'nationality' => [50, 130],
    'house' => [50, 140],
    'visa_type' => [50, 150],
    'visa_expiry' => [50, 160],
    'flat' => [50, 170],
    'floor' => [50, 180],
    'fishing_license_expiry' => [50, 190],
    'employer' => [50, 200],
    'phone' => [50, 210],
    'sponsor_name' => [50, 220],
    'sponsor_cid' => [50, 230]
];

// Add the data to the PDF
foreach ($data as $field => $value) {
    $pdf->SetXY($coordinates[$field][0], $coordinates[$field][1]);
    $pdf->Cell(0, 10, $value);
}

// Output the modified PDF
$pdf->Output('output.pdf', 'F');
