<?php
session_start();
include_once 'lib/databaseHandler/connection.php';

$cs_id = $_POST['case_id'];
require('rotation.php');

class PDF extends PDF_Rotate
{
function Header()
{
    //Put the watermark
    $this->SetFont('Arial','B',50);
    $this->SetTextColor(255,192,203);
    $this->RotatedText(35,190,'P A N I C B U T T O N',45);
}

function RotatedText($x, $y, $txt, $angle)
{
    //Text rotated around its origin
    $this->Rotate($angle,$x,$y);
    $this->Text($x,$y,$txt);
    $this->Rotate(0);
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
    if ($select->execute()) {
        $action = 'Generates a printable report for ' . $_POST['case_id'];
        $insertLog = $pdo->prepare("INSERT INTO logs(user_id, user_email, action) values(:id, :user, :action)");

        $insertLog->bindParam(':id', $_SESSION['myid']);
        $insertLog->bindParam(':user', $_SESSION['sos_userEmail']);
        $insertLog->bindParam(':action', $action);
        $insertLog->execute();

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
}
