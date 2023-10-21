<?php
$page = 'Dashboard';
require_once 'lib/databaseHandler/connection.php';
require_once 'lib/init.php';
require_once 'lib/no_session_bypass.php';



?>

<!DOCTYPE html>
<html lang="en">
<?php include_once 'assets/includes/head.php'; ?>
<script type="text/javascript" src="assets/js/dashboard.js"></script>

</head>

<body>

    <?php
    include_once 'assets/includes/navigation.php';
    include_once 'assets/includes/side_navigation.php';
    ?>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                        Dashboard
                    </li>
                </ol>
            </nav>
        </div>
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">

                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card baler-card">
                                <div class="card-body">
                                    <h5 class="card-title">Baler <span>| This Month</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><i class="ri-map-pin-user-line"></i></div>
                                        <div class="ps-3">
                                            <h6 id="baler_cases">0</h6>
                                            <span class="text-success small pt-1 fw-bold">Cases</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card casiguran-card">
                                <div class="card-body">
                                    <h5 class="card-title">Casiguran <span>| This Month</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><i class="ri-map-pin-user-line"></i></i></div>
                                        <div class="ps-3">
                                            <h6 id="casiguran_cases">0</h6>
                                            <span class="text-success small pt-1 fw-bold">Cases</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card dilasag-card">
                                <div class="card-body">
                                    <h5 class="card-title">Dilasag <span>| This Month</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><i class="ri-map-pin-user-line"></i></div>
                                        <div class="ps-3">
                                            <h6 id="dilasag_cases">0</h6>
                                            <span class="text-success small pt-1 fw-bold">Cases</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card dinalungan-card">
                                <div class="card-body">
                                    <h5 class="card-title">Dinalungan <span>| This Month</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><i class="ri-map-pin-user-line"></i></div>
                                        <div class="ps-3">
                                            <h6 id="dinalungan_cases">0</h6>
                                            <span class="text-success small pt-1 fw-bold">Cases</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card dingalan-card">
                                <div class="card-body">
                                    <h5 class="card-title">Dingalan <span>| This Month</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><i class="ri-map-pin-user-line"></i></div>
                                        <div class="ps-3">
                                            <h6 id="dingalan_cases">0</h6>
                                            <span class="text-success small pt-1 fw-bold">Cases</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card dipaculao-card">
                                <div class="card-body">
                                    <h5 class="card-title">Dipaculao <span>| This Month</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><i class="ri-map-pin-user-line"></i></div>
                                        <div class="ps-3">
                                            <h6 id="dipaculao_cases">0</h6>
                                            <span class="text-success small pt-1 fw-bold">Cases</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card maria-card">
                                <div class="card-body">
                                    <h5 class="card-title">Maria Aurora <span>| This Month</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><i class="ri-map-pin-user-line"></i></div>
                                        <div class="ps-3">
                                            <h6 id="maria_cases">0</h6>
                                            <span class="text-success small pt-1 fw-bold">Cases</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sanLuis-card">
                                <div class="card-body">
                                    <h5 class="card-title">San Luis <span>| This Month</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"><i class="ri-map-pin-user-line"></i></div>
                                        <div class="ps-3">
                                            <h6 id="sanLuis_cases">0</h6>
                                            <span class="text-success small pt-1 fw-bold">Cases</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

                <!-- right side start-->

                <div class="col-lg-4">

                    <div class="card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Recent Activity <span>| Today</span></h5>
                            <div id="activity" class="activity">
                                
                            </div>
                        </div>
                    </div>


                </div>
                <!-- right side end -->
            </div>

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