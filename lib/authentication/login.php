<?php
session_start();
require_once '../databaseHandler/connection.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $loginErrorEmail = false;
    $loginErrorPassword = false;
    $combinationError = false;

    $select = $pdo->prepare("SELECT email FROM users WHERE email = '$email'");
    $select->execute();

    if (empty($email)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $loginErrorEmail = true;
    } elseif (empty($password)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $loginErrorPassword = true;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<span class='form-error'>Invalid Email</span>";
        $loginErrorEmail = true;
    } elseif ($select->rowCount() < 1) {
        echo "<span class='form-error'>Theres no account associated in this e-mail!</span>";
        $loginErrorEmail = true;
    } else {
        $select = $pdo->prepare("SELECT * FROM users WHERE email = '$email'");
        $select->execute();
        $row = $select->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $row['password'])) {

            $id = $row['user_id'];
            $_SESSION['myid'] = $id;
            $_SESSION['sos_userEmail'] = $row['email'];
            if (password_verify('1', $row['privilege'])) {
                $_SESSION['sos_userType'] = '1';
            }
        } else {
            $combinationError = true;
        }
    }
} else {
    echo '<script type="text/javascript">
            Swal.fire({
                title: "Something went wrong!",
                text: "Please try again",
                icon: "error",
            })
            </script>';
}
?>
<script>
    $("#email, #password").removeClass(".input-error");

    var loginErrorEmail = "<?php echo $loginErrorEmail; ?>";
    var loginErrorPassword = "<?php echo $loginErrorPassword; ?>";
    var combinationError = "<?php echo $combinationError; ?>";

    if (loginErrorEmail == true) {
        $("#email").addClass("input-error");
    }
    if (loginErrorPassword == true) {
        $("#password").addClass("input-error");
    }
    if (combinationError == true) {

    }

    if (loginErrorEmail == false) {
        $("#email").removeClass(".input-error");
    }
    if (loginErrorPassword == false) {
        $("#password").removeClass(".input-error");
    }

    if (loginErrorEmail == false && loginErrorPassword == false) {

        if (combinationError == false) {
            Swal.fire({
                title: "Login Successful!",
                text: "Redirecting to home page",
                icon: "success",
                timer: 2000,
                timerProgressBar: true,
                showConfirmButton: false
            });

            setTimeout(function() {
                window.location.replace("home.php"); //will redirect to homepage
            }, 2000); //redirect after 2 seconds
        }else{
            Swal.fire({
                title: "Incorrect Password!!!",
                text: "Please try again",
                icon: "error",
                timer: 2000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        }


    }
</script>