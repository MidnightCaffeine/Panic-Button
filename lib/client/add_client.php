<?php
require_once '../databaseHandler/connection.php';


if (isset($_POST['add_fees'])) {
    $fees_title = $_POST['fees_title'];
    $fees_details = $_POST['fees_details'];
    $fees_year = $_POST['fees_year'];
    $fees_cost = $_POST['fees_cost'];
    $deadline = strtotime($_POST['deadline']);
    $deadline = date("Y-m-d", $deadline);

    $errorTitle = false;
    $errorDetails = false;
    $errorYear = false;
    $errorCost = false;
    $errorDeadline = false;

    // error handler for empty fields
    if (empty($fees_title)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorTitle = true;
    } elseif (empty($fees_details)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorDetails = true;
    } elseif (empty($fees_cost)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorCost = true;
    } elseif (empty($deadline)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorDeadline = true;
    } else {
        $insert = $pdo->prepare("INSERT INTO fees_list(fees_title, fees_description, year_included, cost, deadline) VALUES(:fees_title, :fees_description, :year_included, :cost, :deadline)");

        $insert->bindparam('fees_title', $fees_title);
        $insert->bindparam('fees_description', $fees_details);
        $insert->bindparam('year_included', $fees_year);
        $insert->bindparam('cost', $fees_cost);
        $insert->bindparam('deadline', $deadline);

        $insert->execute();
    }
}
?>

<script>
    $("#fees_title, #fees_details, #fees_cost, #deadline").removeClass(".input-error");

    var errorTitle = "<?php echo $errorTitle; ?>";
    var errorDetails = "<?php echo $errorDetails; ?>";
    var errorYear = "<?php echo $errorYear; ?>";
    var errorCost = "<?php echo $errorCost; ?>";
    var errorDeadline = "<?php echo $errorDeadline; ?>";

    if (errorTitle == true) {
        $("#fees_title").addClass("input-error");
    }
    if (errorDetails == true) {
        $("#fees_details").addClass("input-error");
    }
    if (errorCost == true) {
        $("#fees_cost").addClass("input-error");
    }
    if (errorDeadline == true) {
        $("#deadline").addClass("input-error");
    }

    if (errorTitle == false && errorDetails == false && errorCost == false && errorDeadline == false) {
        $("#fees_title, #fees_details, #fees_cost, #deadline").val("");

        var myModalEl = document.getElementById('addFees');
        var modal = bootstrap.Modal.getInstance(myModalEl)
        modal.hide();

        $('#feesTable').DataTable().ajax.reload();

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