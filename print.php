<?php
require 'vendor/autoload.php';

use setasign\Fpdi\Fpdi;

// Create new FPDI instance
$pdf = new Fpdi();

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', 'B', 16);

// Add a cell
$pdf->Cell(40, 10, 'Hello World!');

// Output the PDF
$pdf->Output();
?>