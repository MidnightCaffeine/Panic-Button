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
                <span>Crime Record</span>
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
                <i class="bi bi-wallet2"></i>
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