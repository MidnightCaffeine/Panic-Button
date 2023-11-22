<?php
$page = 'Cases';
require_once 'lib/databaseHandler/connection.php';
session_start();
require_once 'lib/no_session_bypass.php';
require_once 'assets/includes/functions.php';
date_default_timezone_set('Asia/Manila');

?>

<!DOCTYPE html>
<html lang="en">
<?php include_once 'assets/includes/head.php'; ?>
<script type="text/javascript" src="assets/js/crime.js"></script>

</head>

<body>

    <?php
    include_once 'assets/includes/navigation.php';
    include_once 'assets/includes/side_navigation.php';
    ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Crime Cases List</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Crime Cases List</li>
                </ol>
            </nav>
        </div>
        <section class="section dashboard">

            <table id="crimeListTable" class="display table table-bordered">
                <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Coordinates</th>
                        <th>Barangay</th>
                        <th>Date</th>
                        <th>Action</th>
                        <!-- <th>set location</th> -->
                    </tr>
                </thead>

            </table>

        </section>
    </main>



    <?php

    include_once 'assets/includes/footer.php';
    require_once 'assets/includes/script.php';
    ?>

    <?php

    ?>

</body>

</html>