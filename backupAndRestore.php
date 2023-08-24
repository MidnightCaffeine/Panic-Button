<?php
$page = 'Backup And Restore';
require_once 'lib/databaseHandler/connection.php';
require_once 'lib/init.php';
require_once 'lib/no_session_bypass.php';

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
        <section class="section dashboard">

            <div class="container">
                <div class="row">
                    <div class="col-6 mb-4">
                        <div class="card">
                            <h4 class="card-title ms-4">Backup</h4>
                            <p class="card-text ms-4">Save backup of the database.</p>
                            <div class="d-grid gap-2 ms-4 mb-4 me-4">
                                <a class="btn btn-primary" href="backup.php">Backup</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title ms-4">Restore</h4>
                                <p class="card-text ms-4">Restore data of the database.</p>
                                <div class="d-grid gap-2 ms-4 mb-4 me-4">
                                    <a class="btn btn-primary" href="restore.php">Restore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>

        </section>
    </main>

    <?php
    include_once 'assets/includes/footer.php';
    require_once 'assets/includes/script.php';
    ?>
</body>

</html>