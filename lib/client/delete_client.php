<?php
session_start();
include_once '../databaseHandler/connection.php';

if(isset($_POST["fee_id"]))
{
    $statement = $pdo->prepare(
        "DELETE FROM fees_list WHERE fees_id = :id"
    );
    $result = $statement->execute(
 
        array(':id' =>   $_POST["fee_id"])
         
        );
}
?>