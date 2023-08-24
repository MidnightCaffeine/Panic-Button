<?php
require_once '../databaseHandler/connection.php';

if (isset($_POST['signUp'])) {
    $register_firstname = $_POST['register_firstname'];
    $register_lastname = $_POST['register_lastname'];
    $register_middlename = $_POST['register_middlename'];
    $register_email = $_POST['register_email'];
    $year_group = $_POST['year_group'];
    $section = $_POST['section'];
    $register_password = $_POST['register_password'];
    $confirm_password = $_POST['confirm_password'];
    $hashed_password = password_hash($register_password, PASSWORD_DEFAULT);
    $position = password_hash('3', PASSWORD_DEFAULT);

    $errorEmpty = false;
    $errorEmail = false;
    $errorPassword = false;

    // error handler for empty fields
    if (empty($register_firstname) || empty($register_lastname) || empty($register_email) || empty($register_password) || empty($confirm_password)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorEmpty = true;
    }

    // error handler for email format
    elseif (!filter_var($register_email, FILTER_VALIDATE_EMAIL)) {
        echo "<span class='form-error'>Invalid Email</span>";
        $errorEmail = true;
    }

    // error handler for checking if the email already exist
    elseif (isset($_POST[$register_email])) {
        $select = $pdo->prepare("SELECT email FROM  users WHERE email = '$register_email'");
        $select->execute();

        if ($select->rowCount() > 0) {
            echo "<span class='form-error'>Email Already Exist!</span>";
            $errorEmail = true;
        }
    }

    // error handler for confirming password
    elseif ($register_password != $confirm_password && !empty($confirm_password) && !empty($register_password)) {
        echo "<span class='form-error'>Password must be matched</span>";
        $errorPassword = true;
    }

    // inserts the data to the database
    else {
        $insert = $pdo->prepare("INSERT INTO users(email, password, privilege) VALUES(:email, :password, :privilege)");

        $insert->bindparam('email', $register_email);
        $insert->bindparam('password', $hashed_password);
        $insert->bindparam('privilege', $position);

        if ($insert->execute()) {

            $select = $pdo->prepare("SELECT user_id FROM users WHERE email = '$register_email'");
            $select->execute();
            while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['user_id'];
            }

            $insert = $pdo->prepare("INSERT INTO students (user_id, firstname, middlename, lastname, year_group, section) VALUES(:id, :firstname, :middlename, :lastname, :year_group, :section)");

            $insert->bindparam('id', $id);
            $insert->bindparam('firstname', $register_firstname);
            $insert->bindparam('middlename', $register_middlename);
            $insert->bindparam('lastname', $register_lastname);
            $insert->bindparam('year_group', $year_group);
            $insert->bindparam('section', $section);

            if ($insert->execute()) {
                echo '<script type="text/javascript">
                Swal.fire({
                    title: "Registration Successful!",
                    text: "You can login to your account now",
                    icon: "success",
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false
                })
                </script>';
            }
        }
    }
} else {
    echo "There was an error!";
}
?>

<script>
    $("#register_firstname, #register_lastname, #register_middlename, #register_email, #register_password, #confirm_password").removeClass(".input-error");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";
    var errorPassword = "<?php echo $errorPassword; ?>";

    if (errorEmpty == true) {
        $("#register_firstname, #register_lastname, #register_email, #register_password, #confirm_password").addClass("input-error");
    }
    if (errorEmail == true) {
        $("#register_email").addClass("input-error");
    }
    if (errorPassword == true) {
        $("#confirm_password").addClass("input-error");
    }
    if (errorEmail == false && errorEmpty == false && errorPassword == false) {
        $("#register_firstname, #register_lastname, #register_middlename, #register_email, #register_password, #confirm_password").val("");

        var myModalEl = document.getElementById('staticBackdrop');
        var modal = bootstrap.Modal.getInstance(myModalEl)
        modal.hide();
    }
</script>