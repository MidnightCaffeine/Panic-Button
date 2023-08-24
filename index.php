<?php

require_once 'lib/databaseHandler/connection.php';
require_once 'lib/init.php';

if (isset($_SESSION['sos_userEmail'])) {
    header("Location: home.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/img/logo.png" rel="icon">
    <title>Panic button Login</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/material_design_icons.min.css" />
    <link rel="stylesheet" href="assets/css/b4.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <link rel="stylesheet" href="assets/css/animate.min.css" />
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css" />
    <script type="text/javascript" src="assets/js/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#login-form').submit(function(event) {
                event.preventDefault();

                var email = $('#email').val();
                var password = $('#password').val();
                var login = $('#login').val();

                $(".login-message").load("lib/authentication/login.php", {
                    email: email,
                    password: password,
                    login: login
                });

            });
        });
    </script>
</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="assets/img/login.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="assets/img/panicLogo.png" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Sign in</p>
                            <form id="login-form" action="lib/authentication/login.php" method="post">
                            <p class="login-message"></p>
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                                </div>
                                <input name="btn_login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                            </form>
                            <a href="#!" class="forgot-password-link">Forgot password?</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <script type="text/javascript" src="assets/js/p4.js"></script>
    <script type="text/javascript" src="assets/js/b4.js"></script>
</body>

</html>