<?php

session_start();
date_default_timezone_set('Asia/Manila');
include_once '../databaseHandler/connection.php';
require_once '../../assets/includes/time_relative.php';

$statement = $pdo->prepare(
    "SELECT * FROM logs ORDER BY log_id DESC LIMIT 5"
);
$statement->execute();
$result = $statement->fetchAll();
foreach ($result as $row) {
?>
    <div class="activity-item d-flex">
        <div class="activite-label">
            <?php echo time2str($row['log_date']); ?>
        </div>
        <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
        <div class="activity-content"><strong><?php echo $row['user_email']; ?> </strong><?php echo $row['action']; ?></div>
    </div>
<?php
}
?>