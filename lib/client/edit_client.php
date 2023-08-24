<?php
require_once '../databaseHandler/connection.php';


if (isset($_POST['edit_fees'])) {

    $id = $_POST['hid'];
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

        $update = $pdo->prepare("UPDATE fees_list SET fees_title = :fees_title, fees_description = :fees_description, year_included = :year_included , cost = :cost , deadline = :deadline WHERE fees_id = :id");

        $update->bindparam('fees_title', $fees_title);
        $update->bindparam('fees_description', $fees_details);
        $update->bindparam('year_included', $fees_year);
        $update->bindparam('cost', $fees_cost);
        $update->bindparam('deadline', $deadline);
        $update->bindparam('id', $id);

        $update->execute();
    }
}
?>

<script>
    $("#edit_fees_title, #edit_fees_details, #edit_fees_cost, #edit_deadline").removeClass(".input-error");

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
        $("#edit_fees_title, #edit_fees_details, #edit_fees_cost, #edit_deadline").val("");

        var myModalEl = document.getElementById('editFees');
        var modal = bootstrap.Modal.getInstance(myModalEl)
        modal.hide();

        $('#feesTable').DataTable().ajax.reload();

        Swal.fire({
            title: "Details Changed!!!",
            text: "Details updated on th database",
            icon: "success",
            timer: 2000,
            timerProgressBar: true,
            showConfirmButton: false
        });
    }
</script>