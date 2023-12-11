<?php

require_once 'lib/databaseHandler/connection.php';
require_once 'assets/includes/functions.php';
$subcity = "Havent yet viewed location";

if (isset($_POST['message'])) {

    $message = $_POST['message'];
    $phone = "+" . trim($_POST['phone']);
    $split = explode("=", $message);

    $coordinates = $split[1];
    $scoor = explode(",", $coordinates);
    $lat = $scoor[0];
    $long = $scoor[1];



    //if ($lat != '0.0000000' && $long != '0.0000000') {

    $select = $pdo->prepare("SELECT * FROM client_list WHERE device_id = '$phone'");
    $select->execute();
    while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $middlename = $row['middlename'];
        $client_id = $row['client_id'];
        $device_id = $row['device_id'];
        $fullname = $firstname . " " . $middlename . " " . $lastname;
    }

    if ($select->rowCount() > 0) {
        $insert = $pdo->prepare("INSERT INTO crime_list(name, coordinates, municipality) VALUES(:fullname, :coordinates , :subcity)");
        $insert->bindParam("fullname", $fullname);
        $insert->bindParam("coordinates", $coordinates);
        $insert->bindParam("subcity", $subcity);
        if ($insert->execute()) {
            $action = $fullname.' Pushed the button at coordinates ' . $coordinates;
            $insertLog = $pdo->prepare("INSERT INTO logs(user_id, user_email, action) values(:id, :user, :action)");
            $insertLog->bindParam(':id', $client_id);
            $insertLog->bindParam(':user', $device_id);
            $insertLog->bindParam(':action', $action);
            $insertLog->execute();

            echo "success";
        }
    }
    //} else {
    // echo "Invalid location";
    // echo $lat;
    // echo $long;
    //}
}
