<?php
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);
session_set_cookie_params(time() + 600, '/', 'localhost', false, true);
session_start();

if (!isset($_SESSION['last_generated'])) {
    session_regenerate_id(true);
    $_SESSION['last_generated'] = time();
} else {

    $interval = 60 * 30;

    if (time() - $_SESSION['last_generated'] >= $interval) {

        session_regenerate_id(true);
        $_SESSION['last_generated'] = time();
    }
}
