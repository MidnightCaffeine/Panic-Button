<?php
session_start();
date_default_timezone_set('Asia/Manila');
include_once '../databaseHandler/connection.php';
require_once '../../assets/includes/time_relative.php';

$statement = $pdo->prepare(
    "SELECT * FROM crime_list WHERE status = 0 ORDER BY crime_id DESC LIMIT 6"
);
$statement->execute();
$result = $statement->fetchAll();
foreach ($result as $row) {
?>
    <li class="notification-item">
        <i class="bi bi-exclamation-circle text-warning"></i>
        <div>
            <h4><?php echo $row['name'];?></h4>
            <p>Needs help on coodinates <?php echo $row['coordinates'];?></p>
            <p><?php echo time2str($row['date'])?></p>
        </div>
    </li>
    <li>
        <hr class="dropdown-divider">
    </li>
<?php
}
?>