<?php

include_once '../databaseHandler/connection.php';

$time = date("h:i:s A");
$date = date("Y-m-d");
$status = 0;

if (isset($_POST["phone"])) {

    $checkPhone = $pdo->prepare(
        "SELECT * FROM client_list WHERE device_id = :phone"
    );
    $checkPhone->bindParam('phone', $_POST['phone']);
    $checkPhone->execute();

    if ($checkPhone->rowCount() > 0) {
        while ($row = $checkPhone->fetch(PDO::FETCH_ASSOC)) {
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $middlename = $row['middlename'];
        }

        $insert = $pdo->prepare(
            "INSERT INTO crime_list(firstname, lastname, middlename, coordinates, municipality, date, time, status) VALUES(:firstname, :lastname, :middlename, :coordinates, :village, :date, :time, :status)"
        );
        $insert->bindParam('firstname', $firstname);
        $insert->bindParam('lastname', $lastname);
        $insert->bindParam('middlename', $middlename);
        $insert->bindParam('coordinates', $_POST['coordinates']);
        $insert->bindParam('village', $_POST['village']);
        $insert->bindParam('date', $date);
        $insert->bindParam('time', $time);
        $insert->bindParam('status', $status);
    }
}
