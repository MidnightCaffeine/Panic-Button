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
                        <th>No.</th>
                        <th>Fullname</th>
                        <th>Coordinates</th>
                        <th>Municipality</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Audio</th>
                        <th>Report</th>
                        <!-- <th>set location</th> -->
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

    <div class="modal fade" id="createReport" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="reportTitle">Create Report</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form autocomplete="off" id="createReportForm" action="lib/crime/submit_report.php" method="post">
                        <input autocomplete="false" name="hidden" type="text" style="display:none;">
                        <p class="form-message"></p>
                        <input type="hidden" id="hidden_id" name="hidden_id">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="victim_name" name="victim_name" placeholder="victim_name" readonly>
                            <label for="victim_name">Victim Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="reporting_officer" name="reporting_officer" placeholder="Reporting Officer">
                            <label for="reporting_officer">Reporting Officer</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select id="municipality" name="municipality" class="form-select" aria-label="Municipality">
                                <option value="Baler" selected>Baler</option>
                                <option value="Casiguran">Casiguran</option>
                                <option value="Dilasag">Dilasag</option>
                                <option value="Dinalungan">Dinalungan</option>
                                <option value="Dingalan">Dingalan</option>
                                <option value="Dipaculao">Dipaculao</option>
                                <option value="Maria Aurora">Maria Aurora</option>
                                <option value="San Luis">San Luis</option>
                            </select>
                            <label for="municipality">Municipality</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                            <label for="address">Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="incident" name="incident" placeholder="Incident">
                            <label for="incident">Incident</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea type="text" class="form-control" id="details" placeholder="Event Details"></textarea>
                            <label for="details">Event Details</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea type="text" class="form-control" id="actions" placeholder="Actions"></textarea>
                            <label for="actions">Actions Taken</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea type="text" class="form-control" id="summary" placeholder="Summary"></textarea>
                            <label for="summary">Summary</label>
                        </div>

                        <div class="col-md-12 text-center block">
                            <button type="submit" name="add_report" id="add_report" class="btn btn-success w-100">Submit Report</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="uploadAudios" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="uploads">Upload Evidence</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input autocomplete="false" name="hidden" type="text" style="display:none;">
                    <p class="form-message"></p>

                    <form id="form" action="lib/crime/upload_audio.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="hidden_caseid" name="hidden_caseid">
                        <input type="hidden" id="hidden_victim_name" name="hidden_victim_name">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="uploadImage" accept="audio/*" name="image">
                            <label class="input-group-text" for="audioFile">Upload</label>
                        </div>
                        <div class="col-md-12 text-center block">
                            <input type="submit" name="add_report" id="button" class="btn btn-success w-100" value="Upload">
                        </div>
                    </form>
                    <div id="err"></div>

                    <hr>
                </div>

            </div>
        </div>
    </div>

</body>

</html>