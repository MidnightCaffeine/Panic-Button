<?php
session_start();
include_once '../databaseHandler/connection.php';


if(isset($_POST["member_id"]))
{
    $output = array();
    $statement = $pdo->prepare(
        "SELECT * FROM fees_list WHERE fees_id = '".$_POST["member_id"]."' LIMIT 1"
    );
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $output["title"] = $row["fees_title"];
        $output["descripton"] = $row["fees_description"];
        $output["year"] = $row["year_included"];
        $output["cost"] = $row["cost"];
        $output["deadline"] = $row["deadline"];
    }
    echo json_encode($output);
}
?>