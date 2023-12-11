<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link 
            <?php
            if ($page != 'Dashboard') {
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
            if ($page != 'Cases') {
                echo 'collapsed';
            }
            ?>
            " href="cases.php">
                <i class="bi bi-folder"></i>
                <span>Cases</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link 
            <?php
            if ($page != 'Reports') {
                echo 'collapsed';
            }
            ?>
            " href="reports.php">
                <i class="bi bi-file-earmark"></i>
                <span>Reports</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link 
            <?php
            if ($page != 'Clients') {
                echo 'collapsed';
            }
            ?>
            " href="client_list.php">
                <i class="bi bi-person-badge"></i>
                <span>Client list</span>
            </a>
        </li>

        <?php
        if ($_SESSION['sos_userType'] == '1') {
            // Only super Admin access
        ?>
            <li class="nav-item">
                <a class="nav-link 
            <?php
            if ($page != 'Backup And Restore') {
                echo 'collapsed';
            }
            ?>
            " href="backupAndRestore.php">
                    <i class="bi bi-archive"></i>
                    <span>Backup And Restore</span>
                </a>
            </li>
        <?php
        }
        ?>

        <!-- <li class="nav-item">
            <a class="nav-link 
            <?php
            // if ($page != 'Logs') {
            //echo 'collapsed';
            //}
            ?>
            " href="Payments.html">
                <i class="bi bi-file-earmark-richtext"></i>
                <span>Log</span>
            </a>
        </li> -->
    </ul>
</aside>