<?php
session_start();
include_once '../databaseHandler/connection.php';


if(isset($_POST["member_id"]))
{
    $output = array();
    $statement = $pdo->prepare(
        "SELECT * FROM client_list WHERE client_id = '".$_POST["member_id"]."' LIMIT 1"
    );
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $output["firstname"] = $row["firstname"];
        $output["lastname"] = $row["lastname"];
        $output["middlename"] = $row["middlename"];
        $output["age"] = $row["age"];
        $output["address"] = $row["address"];
        $output["device_id"] = $row["device_id"];
    }
    echo json_encode($output);
}
?>