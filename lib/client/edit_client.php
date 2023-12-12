<?php
require_once '../databaseHandler/connection.php';
session_start();


if (isset($_POST['edit_client'])) {

    $id = $_POST['hid'];
    $edit_client_firstname = $_POST['edit_client_firstname'];
    $edit_client_middlename = $_POST['edit_client_middlename'];
    $edit_client_lastname = $_POST['edit_client_lastname'];
    $edit_client_age = $_POST['edit_client_age'];
    $edit_client_address = $_POST['edit_client_address'];
    $edit_client_device_id = $_POST['edit_client_device_id'];

    $errorFirstname = false;
    $errorLastname = false;
    $errorMiddlename = false;
    $errorAge = false;
    $errorAddress = false;
    $errorDevice = false;

    // error handler for empty fields
    if (empty($edit_client_firstname)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorFirstname = true;
    } elseif (empty($edit_client_middlename)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorLastname = true;
    } elseif (empty($edit_client_middlename)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorMiddlename = true;
    } elseif (empty($edit_client_age)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorAge = true;
    } elseif (empty($edit_client_address)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorAddress = true;
    } elseif (empty($edit_client_device_id)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorDevice = true;
    } else {

        $update = $pdo->prepare("UPDATE client_list SET firstname = :firstname, lastname = :lastname, middlename = :middlename , age = :age , address = :address, device_id = :device_id WHERE client_id = :id");

        $update->bindparam('firstname', $edit_client_firstname);
        $update->bindparam('lastname', $edit_client_lastname);
        $update->bindparam('middlename', $edit_client_middlename);
        $update->bindparam('age', $edit_client_age);
        $update->bindparam('address', $edit_client_address);
        $update->bindparam('device_id', $edit_client_device_id);
        $update->bindparam('id', $id);

        $update->execute();

        $action = 'Edit information of ' . $edit_client_firstname . ' ' . $edit_client_middlename . ' ' . $edit_client_lastname . ' on the client list';
        $insertLog = $pdo->prepare("INSERT INTO logs(user_id, user_email, action) values(:id, :user, :action)");

        $insertLog->bindParam(':id', $_SESSION['myid']);
        $insertLog->bindParam(':user', $_SESSION['sos_userEmail']);
        $insertLog->bindParam(':action', $action);
        $insertLog->execute();
    }
}
?>
<script>
    $("#edit_client_firstname, #edit_client_lastname, #edit_client_middlename, #edit_client_age, #edit_client_address, #edit_client_device_id").removeClass(".input-error");

    var errorFirstname = "<?php echo $errorFirstname; ?>";
    var errorLastname = "<?php echo $errorLastname; ?>";
    var errorMiddlename = "<?php echo $errorMiddlename; ?>";
    var errorAge = "<?php echo $errorAge; ?>";
    var errorAddress = "<?php echo $errorAddress; ?>";
    var errorDevice = "<?php echo $errorDevice; ?>";


    if (errorFirstname == true) {
        $("#client_firstname").addClass("input-error");
    }
    if (errorLastname == true) {
        $("#client_lastname").addClass("input-error");
    }
    if (errorMiddlename == true) {
        $("#client_middlename").addClass("input-error");
    }
    if (errorAge == true) {
        $("#client_age").addClass("input-error");
    }
    if (errorAddress == true) {
        $("#client_address").addClass("input-error");
    }
    if (errorDevice == true) {
        $("#client_device_id").addClass("input-error");
    }

    if (errorFirstname == false && errorLastname == false && errorMiddlename == false && errorAge == false && errorAddress == false && errorDevice == false) {
        $("#edit_client_firstname, #edit_client_lastname, #edit_client_middlename, #edit_client_age, #edit_client_address, #edit_client_device_id").val("");

        var myModalEl = document.getElementById('editClient');
        var modal = bootstrap.Modal.getInstance(myModalEl)
        modal.hide();

        $('#clientTable').DataTable().ajax.reload();

        Swal.fire({
            title: "Adding Fess Successful!",
            text: "You can now view the fees on fees tab",
            icon: "success",
            timer: 2000,
            timerProgressBar: true,
            showConfirmButton: false
        });
    }
</script>