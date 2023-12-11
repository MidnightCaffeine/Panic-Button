<?php
session_start();
include_once '../databaseHandler/connection.php';


if (isset($_POST['crime_id'])) {
    $output = array();
    $select = $pdo->prepare(
        "SELECT * FROM reports WHERE crime_id = '" . $_POST["crime_id"] . "'"
    );
    $select->execute();
    $result = $select->fetchAll();
    foreach ($result as $row) {
        $output["fullname"] = $row["victim_name"];
        $output["officer"] = $row["reporting_officer"];
        $output["address"] = $row["address"];
        $output["incident"] = $row["incident"];
        $output["action"] = $row["actions_taken"];
        $output["summary"] = $row["summary"];
        $output["date"] = date("F j, Y, g:i a", strtotime($row["date"]));
        $output["details"] = $row["details"];
        $output["audio"] = $row["audio"];
    }
    echo json_encode($output);
}
