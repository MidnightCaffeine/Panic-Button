<?php
session_start();
include_once '../databaseHandler/connection.php';

if(isset($_POST["fee_id"]))
{
    $statement = $pdo->prepare(
        "DELETE FROM client_list WHERE client_id = :id"
    );
    $result = $statement->execute(
 
        array(':id' =>   $_POST["fee_id"])
         
        );
}
?>