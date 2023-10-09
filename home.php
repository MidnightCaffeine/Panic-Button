<?php
$page = 'Dashboard';
require_once 'lib/databaseHandler/connection.php';
require_once 'lib/init.php';
require_once 'lib/no_session_bypass.php';



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
                                            <h6>4</h6>
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
                                            <h6>3</h6>
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
                                            <h6>15</h6>
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
                                            <h6>6</h6>
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
                                            <h6>1</h6>
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
                                            <h6>2</h6>
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
                                            <h6>1</h6>
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
                                            <h6>4</h6>
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
                            <div class="activity">
                                <div class="activity-item d-flex">
                                    <div class="activite-label">32 min</div>
                                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                    <div class="activity-content"> Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae</div>
                                </div>
                                <div class="activity-item d-flex">
                                    <div class="activite-label">56 min</div>
                                    <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                                    <div class="activity-content"> Voluptatem blanditiis blanditiis eveniet</div>
                                </div>
                                <div class="activity-item d-flex">
                                    <div class="activite-label">2 hrs</div>
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content"> Voluptates corrupti molestias voluptatem</div>
                                </div>
                                <div class="activity-item d-flex">
                                    <div class="activite-label">1 day</div>
                                    <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                                    <div class="activity-content"> Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore</div>
                                </div>
                                <div class="activity-item d-flex">
                                    <div class="activite-label">2 days</div>
                                    <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                                    <div class="activity-content"> Est sit eum reiciendis exercitationem</div>
                                </div>
                                <div class="activity-item d-flex">
                                    <div class="activite-label">4 weeks</div>
                                    <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                                    <div class="activity-content"> Dicta dolorem harum nulla eius. Ut quidem quidem sit quas</div>
                                </div>
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