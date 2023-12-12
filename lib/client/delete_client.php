<?php
session_start();
include_once '../databaseHandler/connection.php';

if (isset($_POST["fee_id"])) {
    $statement = $pdo->prepare(
        "DELETE FROM client_list WHERE client_id = :id"
    );
    $result = $statement->execute(

        array(':id' =>   $_POST["fee_id"])

    );

    $action = 'Delete user ' . $_POST["fee_id"] . ' on the client list';
    $insertLog = $pdo->prepare("INSERT INTO logs(user_id, user_email, action) values(:id, :user, :action)");

    $insertLog->bindParam(':id', $_SESSION['myid']);
    $insertLog->bindParam(':user', $_SESSION['sos_userEmail']);
    $insertLog->bindParam(':action', $action);
    $insertLog->execute();
}
