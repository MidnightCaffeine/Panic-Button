<?php
require('fpdf.php');
session_start();
include_once 'lib/databaseHandler/connection.php';

$cs_id = $_POST['case_id'];

class PDF extends FPDF
{

    // Page header
    function Header()
    {
        global $title;
        // Logo
        $this->Image('assets/img/panicLogo.png', 10, 6, 30);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30, 10, "Panic Button", 1, 0, 'C');
        // Line break
        $this->Ln(20);
    }
}
if (isset($_POST['case_id'])) {
    // Instanciation of inherited class
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->SetTitle("Case No. " . $_POST['case_id']);
    $pdf->AddPage();
    $pdf->SetFont('Times', '', 12);


    $select = $pdo->prepare(
        "SELECT * FROM reports WHERE crime_id = '" . $_POST["case_id"] . "'"
    );
    $select->execute();
    $result = $select->fetchAll();
    foreach ($result as $row) {
        $date = date("F j, Y, g:i a", strtotime($row["date"]));
        $pdf->Cell(0, 10, 'Case Number:  ' . $row["crime_id"], 0, 1);
        $pdf->Cell(0, 10, 'Victim Name:  ' . $row["victim_name"], 0, 1);
        $pdf->Cell(0, 10, 'Date:  ' . $date, 0, 1);
        $pdf->Cell(0, 10, 'Reporting Officer:  ' . $row["reporting_officer"], 0, 1);
        $pdf->Cell(0, 10, 'Address:  ' . $row["address"], 0, 1);
        $pdf->Cell(0, 10, 'Incident:  ' . $row["incident"], 0, 1);
        $pdf->Cell(0, 10, '', 0, 1);
        $pdf->Cell(0, 10, 'Event Details:  ', 0, 1);
        $pdf->Cell(0, 10, $row["details"], 0, 1);
        $pdf->Cell(0, 10, '', 0, 1);
        $pdf->Cell(0, 10, 'Actions taken:  ', 0, 1);
        $pdf->Cell(0, 10,  $row["actions_taken"], 0, 1);
        $pdf->Cell(0, 10, '', 0, 1);
        $pdf->Cell(0, 10, 'Summary:  ', 0, 1);
        $pdf->Cell(0, 10,  $row["summary"], 0, 1);
        $pdf->Cell(0, 10, '', 0, 1);
        $pdf->Output();
    }
}
