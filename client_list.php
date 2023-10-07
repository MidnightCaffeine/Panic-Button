<?php
$page = 'Clients';
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
            <h1>Client List</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Client List</li>
                </ol>
            </nav>
        </div>
        <section class="section dashboard">

            <button type="button" class="btn btn-primary ms-auto mb-3" data-bs-toggle="modal" data-bs-target="#addClient">Add Client</button>

            <table id="clientTable" class="display table table-bordered">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Lastname</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>

            </table>

        </section>
    </main>

    <?php
    include_once 'assets/includes/footer.php';
    require_once 'assets/includes/script.php';
    ?>

    <!-- add fees modal -->
    <div class="modal fade" id="addClient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Client</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addClientForm" action="lib/client/add_client.php" method="post">
                        <p class="form-message"></p>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="client_firstname" name="client_firstname" placeholder="Firstname">
                            <label for="client_firstname">Firstname</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="client_lastname" name="client_lastname" placeholder="Lastname">
                            <label for="client_lastname">Lastname</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="client_middlename" name="client_middlename" placeholder="Middlename">
                            <label for="client_middlename">Middlename</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="client_age" placeholder="Age">
                            <label for="client_age">Age</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="client_address" placeholder="Address">
                            <label for="client_address">Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="client_device_id" placeholder="Phone Number">
                            <label for="client_device_id">Phone Number</label>
                        </div>

                        <div class="col-md-12 text-center block">
                            <button type="submit" name="add_client" id="add_client" class="btn btn-success w-100">Add</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- edit fees modal -->

    <div class="modal fade" id="editClient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Client</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editClientForm" action="lib/fees/edit_client.php" method="post">
                        <p class="form-message"></p>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="edit_client_firstname" name="edit_client_firstname" placeholder="Firstname">
                            <label for="edit_client_firstname">Firstname</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="edit_client_lastname" name="edit_client_lastname" placeholder="Lastname">
                            <label for="edit_client_lastname">Lastname</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="edit_client_middlename" name="edit_client_middlename" placeholder="Middlename">
                            <label for="edit_client_middlename">Middlename</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="edit_client_age" placeholder="Age">
                            <label for="edit_client_age">Age</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="edit_client_address" placeholder="Address">
                            <label for="edit_client_address">Address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="edit_client_device_id" placeholder="Phone Number">
                            <label for="edit_client_device_id">Phone Number</label>
                        </div>
                        <input type="hidden" id="hid" name="hid">
                        <div class="col-md-12 text-center block">
                            <button type="submit" name="edit_cliend" id="edit_client" class="btn btn-success w-100">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


</body>

</html>