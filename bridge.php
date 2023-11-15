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

    $data = loc($lat, $long);


    if ($lat != '0.0000000' && $long != '0.0000000') {

        $select = $pdo->prepare("SELECT * FROM client_list WHERE device_id = '$phone'");
        $select->execute();
        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $middlename = $row['middlename'];
            $fullname = $firstname . " " . $middlename . " " . $lastname;
        }

        if ($select->rowCount() > 0) {
            $insert = $pdo->prepare("INSERT INTO crime_list(name, coordinates, municipality) VALUES(:fullname, :coordinates , :subcity)");
            $insert->bindParam("fullname", $fullname);
            $insert->bindParam("coordinates", $coordinates);
            $insert->bindParam("subcity", $subcity);
            if ($insert->execute()) {

                echo "success";
            }
        }
    } else {
        echo "Invalid location";
        echo $lat;
        echo $long;
        echo $data;
    }
}
