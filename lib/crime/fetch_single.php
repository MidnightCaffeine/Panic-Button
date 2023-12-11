<?php
session_start();
include_once '../databaseHandler/connection.php';


if (isset($_POST['crime_id'])) {
    $output = array();
    $select = $pdo->prepare(
        "SELECT * FROM crime_list WHERE crime_id = '".$_POST["crime_id"]."' LIMIT 1"
    );
    $select->execute();
    $result = $select->fetchAll();
    foreach ($result as $row) {
        $output["fullname"] = $row["name"];
        $output["coordinates"] = $row["coordinates"];
        $output["municipality"] = $row["municipality"];
        $output["date"] = $row["date"];
        $output["status"] = $row["status"];
    }
    echo json_encode($output);
}
