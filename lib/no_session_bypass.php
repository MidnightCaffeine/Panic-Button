<?php

if (!isset($_SESSION['sos_userType'])) {
    session_unset();
    session_write_close();
    session_destroy();
    header("Location: index.php");
}
