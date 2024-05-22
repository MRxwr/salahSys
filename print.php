<?php
require 'vendor/autoload.php';
require_once("admin/includes/config.php");
require_once("admin/includes/functions.php");

if( isset($_GET["id"]) && !empty($_GET["id"]) ){
    if( $user = selectDBNew("applications",[$_GET["id"]],"`id` = ?","")){
        $applicant = json_decode($user[0]["applicant"],true);
        $attachment = json_decode($user[0]["attachment"],true);
        $address = json_decode($user[0]["address"],true);
        $visa = json_decode($user[0]["visa"],true);
        $sponsor = json_decode($user[0]["sponsor"],true);
        $applicationType = $user[0]["applicationType"];
        $licenseType = $user[0]["licenseType"];
    }else{
        ?>
        <script>
            alert("Application not found");
            window.close();
        </script>
        <?php
        die();
    }
}else{
    ?>
    <script>
        alert("Please select an application");
        window.close();
    </script>
    <?php
    die();
}

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
$signatureImage = "logos/{$attachment["photo"]}";

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
    'enName' => ( isset($applicant["enName"]) && !empty($applicant["enName"])) ? $applicant["enName"]: '',
    'arName' => ( isset($applicant["arName"]) && !empty($applicant["arName"])) ? $applicant["arName"]: '',
    'civilId' => ( isset($applicant["civilId"]) && !empty($applicant["civilId"])) ? $applicant["civilId"]: '',
    'gender' => ( isset($applicant["gender"]) && !empty($applicant["gender"])) ? $applicant["gender"]: '',
    'dob' => ( isset($applicant["dob"]) && !empty($applicant["dob"])) ? $applicant["dob"]: '',
    'nationality' => ( isset($applicant["nationality"]) && !empty($applicant["nationality"])) ? $applicant["nationality"]: '',
    'bloodType' => ( isset($applicant["bloodType"]) && !empty($applicant["bloodType"])) ? $applicant["bloodType"]: '',
    'phone' => ( isset($applicant["phone"]) && !empty($applicant["phone"])) ? $applicant["phone"]: '',
    'area' => ( isset($address["area"]) && !empty($address["area"])) ? $address["area"]: '',   
    'street' => ( isset($address["street"]) && !empty($address["street"])) ? $address["street"]: '',
    'block' => ( isset($address["block"]) && !empty($address["block"])) ? $address["block"]: '',
    'house' => ( isset($address["house"]) && !empty($address["house"])) ? $address["house"]: '',
    'flat' => ( isset($address["flat"]) && !empty($address["flat"])) ? $address["flat"]: '',
    'floor' => ( isset($address["floor"]) && !empty($address["floor"])) ? $address["floor"]: '',
    'ave' => ( isset($address["ave"]) && !empty($address["ave"])) ? $address["ave"]: '',
    'visa_type' => ( isset($visa["Type"]) && !empty($visa["Type"])) ? $visa["Type"]: '',
    'visa_expiry' => ( isset($visa["ExpireyDate"]) && !empty($visa["ExpireyDate"])) ? $visa["ExpireyDate"]: '',
    'fishing_license_expiry' => ( isset($visa["FLEdate"]) && !empty($visa["FLEdate"])) ? $visa["FLEdate"]: '',
    'employer' => ( isset($sponsor["Employer"]) && !empty($sponsor["Employer"])) ? $sponsor["Employer"]: '',
    'sponsor_name' => ( isset($sponsor["Name"]) && !empty($sponsor["Name"])) ? $sponsor["Name"]: '',
    'sponsor_cid' => ( isset($sponsor["CivilId"]) && !empty($sponsor["CivilId"])) ? $sponsor["CivilId"]: '',
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
    'profile' => ( isset($attachment["photo"]) && !empty($attachment["photo"])) ? $attachment["photo"]: '',
    'licenseId' => ( isset($user[0]["licenseId"]) && !empty($user[0]["licenseId"])) ? $user[0]["licenseId"]: '',
];

// Map the data to coordinates on the PDF
$coordinates = [
    'enName' => [60, 55],
    'arName' => [135, 62],
    'civilId' => [120, 73],
    'dob' => [120, 80],
    'gender' => [120, 87],
    'bloodType' => [120, 94],
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
    'licenseId' => [160, 45],
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
