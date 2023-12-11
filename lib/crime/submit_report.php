<?php
require_once '../databaseHandler/connection.php';
session_start();

if (isset($_POST['add_report'])) {
    $crime_id = $_POST['crime_id'];
    $client_name = $_POST['client_name'];
    $reporting_officer = $_POST['reporting_officer'];
    $municipality = $_POST['municipality'];
    $address = $_POST['address'];
    $incident = $_POST['incident'];
    $details = $_POST['details'];
    $actions = $_POST['actions'];
    $summary = $_POST['summary'];
    $status = 1;

    $errorsummary = false;
    $errorOfficer = false;
    $errorIncident = false;
    $errorDetails = false;
    $errorAddress = false;
    $errorAction = false;

    // error handler for empty fields
    if (empty($summary)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorsummary = true;
    } elseif (empty($reporting_officer)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorOfficer = true;
    } elseif (empty($address)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorAddress = true;
    } elseif (empty($incident)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorIncident = true;
    } elseif (empty($details)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorDetails = true;
    } elseif (empty($actions)) {
        echo "<span class='form-error'>Fill in all fields!</span>";
        $errorAction = true;
    } else {
        $select = $pdo->prepare("SELECT * FROM reports WHERE crime_id = '$crime_id'");
        $select->execute();
        $row = $select->fetch(PDO::FETCH_ASSOC);
        $audioPath = $row['audio'];

        if ($select->rowCount() > 0) {
            $report = $pdo->prepare("UPDATE reports SET reporting_officer = :reporting_officer, address = :addresse, incident = :incident, details = :details, actions_taken = :actions, summary= :summary WHERE crime_id  = :id");
            $report->bindparam('reporting_officer', $reporting_officer);
            $report->bindparam('addresse', $address);
            $report->bindparam('incident', $incident);
            $report->bindparam('details', $details);
            $report->bindparam('actions', $actions);
            $report->bindparam('summary', $summary);
            $report->bindparam('id', $crime_id);
        } else {
            $report = $pdo->prepare("INSERT INTO reports(crime_id, victim_name, reporting_officer, address, incident, details,actions_taken,summary) VALUES(:crime_id, :client_name, :reporting_officer, :addresse, :incident, :details, :actions, :summary)");

            $report->bindparam('crime_id', $crime_id);
            $report->bindparam('client_name', $client_name);
            $report->bindparam('reporting_officer', $reporting_officer);
            $report->bindparam('addresse', $address);
            $report->bindparam('incident', $incident);
            $report->bindparam('details', $details);
            $report->bindparam('actions', $actions);
            $report->bindparam('summary', $summary);

            $status = 2;
        }


        if ($report->execute()) {
            $update = $pdo->prepare("UPDATE crime_list SET municipality = :municipality, address = :addresses, status = :stats WHERE crime_id  = :id");

            $update->bindparam('municipality', $municipality);
            $update->bindparam('addresses', $address);
            $update->bindparam('stats', $status);
            $update->bindparam('id', $crime_id);
            $update->execute();

            $action = 'Submit report for case no. '.$crime_id;
            $insertLog = $pdo->prepare("INSERT INTO logs(user_id, user_email, action) values(:id, :user, :action)");

            $insertLog->bindParam(':id', $_SESSION['myid'] );
            $insertLog->bindParam(':user', $reporting_officer);
            $insertLog->bindParam(':action', $action);
            $insertLog->execute();
        }
    }
}
?>

<script>
    $("#reporting_officer, #address, #incident, #details, #actions, #summary").removeClass(".input-error");

    var errorSummary = "<?php echo $errorsummary; ?>";
    var errorOfficer = "<?php echo $errorOfficer; ?>";
    var errorIncident = "<?php echo $errorIncident; ?>";
    var errorDetails = "<?php echo $errorDetails; ?>";
    var errorAddress = "<?php echo $errorAddress; ?>";
    var errorAction = "<?php echo $errorAction; ?>";


    if (errorSummary == true) {
        $("#summary").addClass("input-error");
    }
    if (errorOfficer == true) {
        $("#reporting_officer").addClass("input-error");
    }
    if (errorIncident == true) {
        $("#incident").addClass("input-error");
    }
    if (errorDetails == true) {
        $("#details").addClass("input-error");
    }
    if (errorAddress == true) {
        $("#address").addClass("input-error");
    }
    if (errorAction == true) {
        $("#actions").addClass("input-error");
    }

    if (errorSummary == false && errorOfficer == false && errorIncident == false && errorDetails == false && errorAddress == false && errorAction == false) {
        $("#reporting_officer, #address, #incident, #details, #actions, #summary").val("");

        var myModalEl = document.getElementById('createReport');
        var modal = bootstrap.Modal.getInstance(myModalEl)
        modal.hide();

        $('#crimeListTable').DataTable().ajax.reload();

        Swal.fire({
            title: "Report Has Been Recorded!",
            text: "You can now view report on the report  tab",
            icon: "success",
            timer: 2000,
            timerProgressBar: true,
            showConfirmButton: false
        });
    }
</script>