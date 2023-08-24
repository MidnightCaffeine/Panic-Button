<?php
include_once 'lib/connection.php';
session_start();
date_default_timezone_set('Asia/Manila');
$d = date("Y-m-d");
$t = date("h:i:s A");
$action = 'Logout';

session_unset();
session_write_close();
session_destroy();

header('location: ./index.php');