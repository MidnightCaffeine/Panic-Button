<?php
$page = 'Restore';
require_once 'lib/databaseHandler/connection.php';
session_start();
require_once 'lib/no_session_bypass.php';

date_default_timezone_set('Asia/Manila');
$d = date("Y-m-d");
$t = date("h:i:s A");

ini_set('display_errors', 0);

?>

<!DOCTYPE html>
<html lang="en">
<?php include_once 'assets/includes/head.php'; ?>
<script type="text/javascript" src="assets/js/client.js"></script>
</head>

<body>

    <?php
    include_once 'assets/includes/navigation.php';
    include_once 'assets/includes/side_navigation.php';
    ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Backup And Restore</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Backup And Restore</li>
                </ol>
            </nav>
        </div>
        <a href="backupAndRestore.php" type="button" class="btn btn-primary mb-2"><i class='bx bx-arrow-back'></i>Back</a>
        <section class="section dashboard">

            <form method="post" action="" enctype="multipart/form-data">
                <div class="input-group ms-auto">
                    <input type="file" class="form-control" name="backupfile" id="backupfile" aria-describedby="restoreBtn" aria-label="Upload">
                    <button name="restore" class="btn btn-outline-secondary" type="submit" id="restoreBtn">Restore</button>
                </div>
            </form>
            <div class="row mt-3">
                <?php include_once 'lib/backupAndRestore/restore.php'; ?>
            </div>
        </section>
    </main>

    <?php
    include_once 'assets/includes/footer.php';
    require_once 'assets/includes/script.php';
    ?>
</body>

</html>