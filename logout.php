<?php
include_once 'lib/connection.php';
session_start();
date_default_timezone_set('Asia/Manila');

$action = 'Logged out on the system';
$insertLog = $pdo->prepare("INSERT INTO logs(user_id, user_email, action) values(:id, :user, :action)");

$insertLog->bindParam(':id', $_SESSION['myid']);
$insertLog->bindParam(':user', $_SESSION['sos_userEmail']);
$insertLog->bindParam(':action', $action);
$insertLog->execute();


session_unset();
session_write_close();
session_destroy();

header('location: ./index.php');
