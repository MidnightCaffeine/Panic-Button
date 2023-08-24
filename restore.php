<?php
$page = 'Restore';
require_once 'lib/databaseHandler/connection.php';
require_once 'lib/init.php';
require_once 'lib/no_session_bypass.php';

date_default_timezone_set('Asia/Manila');
$d = date("Y-m-d");
$t = date("h:i:s A");

ini_set('display_errors', 0);

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
            <h1>Backup And Restore</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Backup And Restore</li>
                </ol>
            </nav>
        </div>
        <a href="backupAndRestore.php" type="button" class="btn btn-primary mb-2"><i class='bx bx-arrow-back'></i>Back</a>
        <section class="section dashboard">

            <form method="post" action="" enctype="multipart/form-data">
                <div class="input-group ms-auto">
                    <input type="file" class="form-control" name="backupfile" id="backupfile" aria-describedby="restoreBtn" aria-label="Upload">
                    <button name="restore" class="btn btn-outline-secondary" type="submit" id="restoreBtn">Restore</button>
                </div>
            </form>
            <div class="row mt-3">
                <?php
                /**
                 * This file contains the Restore_Database class wich performs
                 * a partial or complete restoration of any given MySQL database
                 * @author Daniel López Azaña <daniloaz@gmail.com>
                 * @version 1.0
                 */
                /**
                 * Define database parameters here
                 */
                if (isset($_POST['restore'])) {
                    $backupfile1 = ($_FILES['backupfile']['name']);


                    $action = 'Restore the database using ' . $backupfile1;
                    define("DB_USER", 'root');
                    define("DB_PASSWORD", '');
                    define("DB_NAME", 'sos');
                    define("DB_HOST", 'localhost');
                    define("BACKUP_DIR", 'backup'); // Comment this line to use same script's directory ('.')
                    define("BACKUP_FILE", $backupfile1); // Script will autodetect if backup file is gzipped based on .gz extension
                    define("CHARSET", 'utf8');

                    /**
                     * The Restore_Database class
                     */
                    class Restore_Database
                    {
                        /**
                         * Host where the database is located
                         */
                        var $host;
                        /**
                         * Username used to connect to database
                         */
                        var $username;
                        /**
                         * Password used to connect to database
                         */
                        var $passwd;
                        /**
                         * Database to backup
                         */
                        var $dbName;
                        /**
                         * Database charset
                         */
                        var $charset;
                        /**
                         * Database connection
                         */
                        var $conn;
                        /**
                         * Constructor initializes database
                         */
                        function __construct($host, $username, $passwd, $dbName, $charset = 'utf8')
                        {
                            $this->host       = $host;
                            $this->username   = $username;
                            $this->passwd     = $passwd;
                            $this->dbName     = $dbName;
                            $this->charset    = $charset;
                            $this->conn       = $this->initializeDatabase();
                            $this->backupDir  = BACKUP_DIR ? BACKUP_DIR : '.';
                            $this->backupFile = BACKUP_FILE ? BACKUP_FILE : null;
                        }
                        protected function initializeDatabase()
                        {
                            try {
                                $conn = mysqli_connect($this->host, $this->username, $this->passwd, $this->dbName);
                                if (mysqli_connect_errno()) {
                                    throw new Exception('ERROR connecting database: ' . mysqli_connect_error());
                                    die();
                                }
                                if (!mysqli_set_charset($conn, $this->charset)) {
                                    mysqli_query($conn, 'SET NAMES ' . $this->charset);
                                }
                            } catch (Exception $e) {
                                print_r($e->getMessage());
                                die();
                            }
                            return $conn;
                        }
                        /**
                         * Backup the whole database or just some tables
                         * Use '*' for whole database or 'table1 table2 table3...'
                         * @param string $tables
                         */
                        public function restoreDb()
                        {
                            try {
                                $sql = '';
                                $multiLineComment = false;
                                $backupDir = $this->backupDir;
                                $backupFile = $this->backupFile;
                                /**
                                 * Gunzip file if gzipped
                                 */
                                $backupFileIsGzipped = substr($backupFile, -3, 3) == '.gz' ? true : false;
                                if ($backupFileIsGzipped) {
                                    if (!$backupFile = $this->gunzipBackupFile()) {
                                        throw new Exception("ERROR: couldn't gunzip backup file " . $backupDir . '/' . $backupFile);
                                    }
                                }
                                /**
                                 * Read backup file line by line
                                 */
                                $handle = fopen($backupDir . '/' . $backupFile, "r");
                                if ($handle) {
                                    while (($line = fgets($handle)) !== false) {
                                        $line = ltrim(rtrim($line));
                                        if (strlen($line) > 1) { // avoid blank lines
                                            $lineIsComment = false;
                                            if (preg_match('/^\/\*/', $line)) {
                                                $multiLineComment = true;
                                                $lineIsComment = true;
                                            }
                                            if ($multiLineComment or preg_match('/^\/\//', $line)) {
                                                $lineIsComment = true;
                                            }
                                            if (!$lineIsComment) {
                                                $sql .= $line;
                                                if (preg_match('/;$/', $line)) {
                                                    // execute query
                                                    if (mysqli_query($this->conn, $sql)) {
                                                        if (preg_match('/^CREATE TABLE `([^`]+)`/i', $sql, $tableName)) {
                                                            $this->obfPrint("Table succesfully restored: `" . $tableName[1] . "`");
                                                        }
                                                        $sql = '';
                                                    } else {
                                                        throw new Exception("ERROR: SQL execution error: " . mysqli_error($this->conn));
                                                    }
                                                }
                                            } else if (preg_match('/\*\/$/', $line)) {
                                                $multiLineComment = false;
                                            }
                                        }
                                    }
                                    fclose($handle);
                                } else {
                                    throw new Exception("ERROR: couldn't open backup file " . $backupDir . '/' . $backupFile);
                                }
                            } catch (Exception $e) {
                                print_r($e->getMessage());
                                return false;
                            }
                            if ($backupFileIsGzipped) {
                                unlink($backupDir . '/' . $backupFile);
                            }
                            return true;
                        }
                        /*
                             * Gunzip backup file
                             *
                             * @return string New filename (without .gz appended and without backup directory) if success, or false if operation fails
                             */
                        protected function gunzipBackupFile()
                        {
                            // Raising this value may increase performance
                            $bufferSize = 4096; // read 4kb at a time
                            $error = false;
                            $source = $this->backupDir . '/' . $this->backupFile;
                            $dest = $this->backupDir . '/' . date("Ymd_His", time()) . '_' . substr($this->backupFile, 0, -3);
                            $this->obfPrint('Uncompressing backup file ' . $source . '... ', 0, 0);
                            // Remove $dest file if exists
                            if (file_exists($dest)) {
                                if (!unlink($dest)) {
                                    return false;
                                }
                            }

                            // Open gzipped and destination files in binary mode
                            if (!$srcFile = gzopen($this->backupDir . '/' . $this->backupFile, 'rb')) {
                                return false;
                            }
                            if (!$dstFile = fopen($dest, 'wb')) {
                                return false;
                            }
                            while (!gzeof($srcFile)) {
                                // Read buffer-size bytes
                                // Both fwrite and gzread are binary-safe
                                if (!fwrite($dstFile, gzread($srcFile, $bufferSize))) {
                                    return false;
                                }
                            }
                            fclose($dstFile);
                            gzclose($srcFile);
                            $this->obfPrint('OK', 0, 2);
                            // Return backup filename excluding backup directory
                            return str_replace($this->backupDir . '/', '', $dest);
                        }
                        /**
                         * Prints message forcing output buffer flush
                         *
                         */
                        public function obfPrint($msg = '', $lineBreaksBefore = 0, $lineBreaksAfter = 1)
                        {
                            if (!$msg) {
                                return false;
                            }
                            $output = '';
                            if (php_sapi_name() != "cli") {
                                $lineBreak = "<br />";
                            } else {
                                $lineBreak = "\n";
                            }
                            if ($lineBreaksBefore > 0) {
                                for ($i = 1; $i <= $lineBreaksBefore; $i++) {
                                    $output .= $lineBreak;
                                }
                            }
                            $output .= $msg;
                            if ($lineBreaksAfter > 0) {
                                for ($i = 1; $i <= $lineBreaksAfter; $i++) {
                                    $output .= $lineBreak;
                                }
                            }
                            if (php_sapi_name() == "cli") {
                                $output .= "\n";
                            }
                            echo $output;
                            if (php_sapi_name() != "cli") {
                                ob_flush();
                            }
                            flush();
                        }
                    }
                    /**
                     * Instantiate Restore_Database and perform backup
                     */
                    // Report all errors
                    error_reporting(E_ALL);
                    // Set script max execution time
                    set_time_limit(900); // 15 minutes
                    if (php_sapi_name() != "cli") {
                        echo '<div style="font-family: monospace;">';
                    }
                    $restoreDatabase = new Restore_Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                    $result = $restoreDatabase->restoreDb(BACKUP_DIR, BACKUP_FILE) ? '<b>DB Restoration successful!</b>' : '<b>DB Restoration unsuccessful!</b>';
                    $restoreDatabase->obfPrint("<b>Restoration result: </b>" . $result, 1);
                    if (php_sapi_name() != "cli") {
                        echo '</div>';
                    }
                    if (strcmp($result, '<b>DB Restoration successful!</b>') == 0) {
                        $pdo = new PDO('mysql:host=localhost;dbname=sos', 'root', '');
                        //echo'Connection Successful!';
                        $insertLog = $pdo->prepare("INSERT INTO logs(user_id, user_email, action, log_date, log_time) values(:id, :user, :action, :logDate, :logTime)");

                        $insertLog->bindParam(':id', $_SESSION['myid']);
                        $insertLog->bindParam(':user', $_SESSION['sos_userEmail']);
                        $insertLog->bindParam(':action', $action);
                        $insertLog->bindParam(':logDate', $d);
                        $insertLog->bindParam(':logTime', $t);
                        $insertLog->execute();
                    }
                }
                ?>
            </div>
        </section>
    </main>

    <?php
    include_once 'assets/includes/footer.php';
    require_once 'assets/includes/script.php';
    ?>
</body>

</html>