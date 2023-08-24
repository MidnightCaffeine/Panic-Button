<?php

if (!isset($_SESSION['sos_userEmail'])) {
    session_unset();
    session_write_close();
    session_destroy();
    header("Location: index.php");
}
