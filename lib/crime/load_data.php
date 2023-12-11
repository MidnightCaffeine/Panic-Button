<?php
session_start();
date_default_timezone_set('Asia/Manila');
include_once '../databaseHandler/connection.php';
require_once '../../assets/includes/time_relative.php';

$statement = $pdo->prepare(
    "SELECT * FROM crime_list ORDER BY crime_id DESC"
);
$statement->execute();
$result = $statement->fetchAll();
foreach ($result as $row) {
?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['coordinates']; ?></td>
        <td><?php echo $row['municipality']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo time2str($row['date']); ?></td>
        <td>
            <?php
            if ($row['status'] == 1) {
            ?>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#viewReport">
                    <i class="bi bi-eye"></i>
                </button>
            <?php
            }
            ?>
            <?php
            if ($row['status'] == 0) {
            ?>
                <button type="button" id="<?php echo $row['crime_id']; ?>" class="btn btn-success addReport">
                    <i class="bi bi-clipboard-check"></i>
                </button>
            <?php
            }
            ?>

            <button type="button" id="<?php echo $row['coordinates']; ?>" class="btn btn-primary setLocation">
                <i class="bi bi-map"></i>
            </button>
        </td>
    </tr>
<?php
}
?>