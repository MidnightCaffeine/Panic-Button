<?php
require_once '../databaseHandler/connection.php';


if (isset($_POST['add_client'])) {
    $client_firstname = $_POST['client_firstname'];
    $client_lastname = $_POST['client_lastname'];
    $client_middlename = $_POST['client_middlename'];
    $client_age = $_POST['client_age'];
    $client_address = $_POST['client_address'];
    $client_device_id = $_POST['client_device_id'];

    $errorFirstname = false;
    $errorLastname = false;
    $errorMiddlename = false;
    $errorAge = false;
    $errorAddress = false;
    $errorDevice = false;

    // error handler for empty fields
    if (empty($client_firstname)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorFirstname = true;
    } elseif (empty($client_lastname)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorLastname = true;
    } elseif (empty($client_middlename)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorMiddlename = true;
    } elseif (empty($client_age)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorAge = true;
    }elseif (empty($client_address)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorAddress = true;
    }elseif (empty($client_device_id)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorDevice = true;
    } else {
        $insert = $pdo->prepare("INSERT INTO client_list(firstname, lastname, middlename, age, address, device_id) VALUES(:client_firstname, :client_lastname, :client_middlename, :client_age, :client_address, :client_device_id)");

        $insert->bindparam('client_firstname', $client_firstname);
        $insert->bindparam('client_lastname', $client_lastname);
        $insert->bindparam('client_middlename', $client_middlename);
        $insert->bindparam('client_age', $client_age);
        $insert->bindparam('client_address', $client_address);
        $insert->bindparam('client_device_id', $client_device_id);

        $insert->execute();
    }
}
?>

<script>
    $("#client_firstname, #client_lastname, #client_middlename, #client_age, #client_address, #client_device_id").removeClass(".input-error");

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
        $("#client_firstname, #client_lastname, #client_middlename, #client_age, #client_address, #client_device_id").val("");

        var myModalEl = document.getElementById('addClient');
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