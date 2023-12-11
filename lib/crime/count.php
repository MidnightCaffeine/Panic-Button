<?php
session_start();
include_once '../databaseHandler/connection.php';


if(isset($_POST["notifs_count"]))
{
    $output = array();
    $statement = $pdo->prepare(
        "SELECT * FROM crime_list WHERE status = 0"
    );
    $statement->execute();
    $output["count"] =  $statement->rowCount();

    echo json_encode($output);
}
?>