<?php

require_once 'lib/databaseHandler/connection.php';

if(isset($_POST['phone'])){
    $phone = $_POST['phone'];
    $coordinates = $_POST['coordinates'];
    
    $check = $pdo->prepare("SELECT * FROM ");
}

?>