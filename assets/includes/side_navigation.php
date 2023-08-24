<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link 
            <?php
            if ($page != 'Home') {
                echo 'collapsed';
            }
            ?>
            " href="home.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link 
            <?php
            if ($page != 'Payments') {
                echo 'collapsed';
            }
            ?>
            " href="payments.php">
                <i class="bi bi-wallet2"></i>
                <span>Payments</span>
            </a>
        </li>

        <?php
        if ($_SESSION['sos_userType'] == '1') {
            // Only super Admin access
        ?>

            <li class="nav-item">
                <a class="nav-link 
            <?php
            if ($page != 'Backup' || $page != 'Restore') {
                echo 'collapsed';
            }
            ?>
            " data-bs-target="#backupAndRestore-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-archive"></i>
                    <span>Backup And Restore</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="backupAndRestore-nav" class="nav-content 
            <?php
            if ($page != 'Backup' || $page != 'Restore') {
                echo 'collapse';
            }
            ?>
            " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="backup.php">
                            <i class="bi bi-circle"></i>
                            <span>Backup</span>
                        </a>
                    </li>
                    <li>
                        <a href="restore.php"> <i class="bi bi-circle"></i><span>Restore</span> </a>
                    </li>
                </ul>
            </li>

        <?php
        }
        ?>

        <li class="nav-item">
            <a class="nav-link 
            <?php
            if ($page != 'Logs') {
                echo 'collapsed';
            }
            ?>
            " href="Payments.html">
                <i class="bi bi-file-earmark-richtext"></i>
                <span>Log</span>
            </a>
        </li>
    </ul>
</aside>