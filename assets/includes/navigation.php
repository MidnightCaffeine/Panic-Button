
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between"> <a href="index.html" class="logo d-flex align-items-center"> <img src="assets/img/logo.png" alt=""> <span class="d-none d-lg-block">Panic Button</span> </a> <i class="bi bi-list toggle-sidebar-btn"></i></div>
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <!-- <li class="nav-item dropdown">
                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown"> <i class="bi bi-bell"></i> <span class="badge bg-primary badge-number">4</span> </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header"> You have 4 new notifications <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="notification-item">
                        <i class="bi bi-exclamation-circle text-warning"></i>
                        <div>
                            <h4>Lorem Ipsum</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>30 min. ago</p>
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="notification-item">
                        <i class="bi bi-x-circle text-danger"></i>
                        <div>
                            <h4>Atque rerum nesciunt</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>1 hr. ago</p>
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="notification-item">
                        <i class="bi bi-check-circle text-success"></i>
                        <div>
                            <h4>Sit rerum fuga</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>2 hrs. ago</p>
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="notification-item">
                        <i class="bi bi-info-circle text-primary"></i>
                        <div>
                            <h4>Dicta reprehenderit</h4>
                            <p>Quae dolorem earum veritatis oditseno</p>
                            <p>4 hrs. ago</p>
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="dropdown-footer"> <a href="#">Show all notifications</a></li>
                </ul>
            </li> -->
            
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown"> <img src="assets/img/profile-img.svg" alt="Profile" class="rounded-circle"> <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['sos_userEmail']?></span> </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <span><?php echo $_SESSION['sos_userEmail']?></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li> <a class="dropdown-item d-flex align-items-center" href="users-profile.html"> <i class="bi bi-person"></i> <span>My Profile</span> </a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li> <a class="dropdown-item d-flex align-items-center" href="logout.php"> <i class="bi bi-box-arrow-right"></i> <span>Sign Out</span> </a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>