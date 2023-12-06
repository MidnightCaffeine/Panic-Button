<?php
session_start();
date_default_timezone_set('Asia/Manila');
include_once '../databaseHandler/connection.php';
require_once '../../assets/includes/time_relative.php';

$statement = $pdo->prepare(
    "SELECT * FROM crime_list WHERE status = 0 ORDER BY crime_id DESC LIMIT 6"
);
$statement->execute();
echo $statement->rowCount();
?>