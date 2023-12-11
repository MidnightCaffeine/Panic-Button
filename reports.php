<?php
$page = 'Reports';
require_once 'lib/databaseHandler/connection.php';
session_start();
require_once 'lib/no_session_bypass.php';
require_once 'assets/includes/functions.php';
date_default_timezone_set('Asia/Manila');

?>

<!DOCTYPE html>
<html lang="en">
<?php include_once 'assets/includes/head.php'; ?>
<script type="text/javascript" src="assets/js/reports.js"></script>

</head>

<body>

    <?php
    include_once 'assets/includes/navigation.php';
    include_once 'assets/includes/side_navigation.php';
    ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Crime Reports</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Crime Reports</li>
                </ol>
            </nav>
        </div>
        <section class="section dashboard">


            <table id="reportsTable" class="display table table-bordered">
                <thead>
                    <tr>
                        <th>Case No.</th>
                        <th>Victim Name</th>
                        <th>Reporting Officer</th>
                        <th>Incident</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Review</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider" id='crime_data'>

                </tbody>
            </table>

        </section>
    </main>



    <?php

    include_once 'assets/includes/footer.php';
    require_once 'assets/includes/script.php';
    ?>

    <?php

    ?>


    <div class="modal fade" id="viewReports" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="reportView">View Report</h1>
                    <button type="button" class="btn-close cls-modal" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <p class="form-message"></p> -->
                    <input type="hidden" id="hidden_id" name="hidden_id">
                    <h5>Evidence Audio</h5>
                    <div id="evidenceDiv">
                        <audio controls>
                            <source id="audio_player1" src="" type="audio/wav" class="audio-player">
                            <source id="audio_player2" src="" type="audio/mp3" class="audio-player">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                    <div id="noAudio">
                        <p>The Reporting Officer Doesnt upload an Audio File</p>
                    </div>
                    <hr>

                    <h5><strong>Case Number:</strong> <span id="caseNo"></span></h5>
                    <h5><strong>Victim Name:</strong> <span id="victim"></span></h5>
                    <h5><strong>Date:</strong> <span id="report_date"></span></h5>
                    <h5><strong>Reporting Officer:</strong> <span id="officer"></span></h5>
                    <h5><strong>Address:</strong> <span id="address"></span></h5>
                    <h5><strong>Incident:</strong> <span id="incident"></span></h5>
                    <hr>
                    <h5><strong>Event Details:</strong></h5>
                    <h5 id="event_details"></h5>
                    <h5><strong>Actions Taken:</strong></h5>
                    <h5 id="actions_taken"></h5>
                    <h5><strong>Summary:</strong></h5>
                    <h5 id="summary"></h5>
                    <form id="form" action="generate_pdf.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="case_id" name="case_id">
                        <div class="col-md-12 text-center block">
                            <button type="submit" name="generate_pdf" id="generate_pdf" class="btn btn-success w-100">Generate PDF</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

</body>

</html>