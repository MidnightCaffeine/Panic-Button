<?php
date_default_timezone_set('Asia/Manila');
// Database connection info 
$dbDetails = array(
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'db'   => 'sos'
);

// DB table to use 
$table = 'reports';

// Table's primary key 
$primaryKey = 'report_id';

// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array(
    array('db' => 'crime_id', 'dt' => 0),
    array('db' => 'victim_name', 'dt' => 1),
    array('db' => 'reporting_officer',  'dt' => 2),
    array('db' => 'incident',  'dt' => 3),
    array('db' => 'address',  'dt' => 4),
    array(
        'db'        => 'date',
        'dt'        => 5,
        'formatter' => function ($d, $row) {
            $d = date("F j, Y, g:i a", strtotime($d));
            return $d;
        }
    ),
    array(
        'db'        => 'crime_id',
        'dt'        => 6,
        'formatter' => function ($d, $row) {
            $d = '
            <button type="button" id="' . $d . '" class="btn btn-success viewReport">
                <i class="bi bi-clipboard-check"></i> View Report
            </button>
            ';
            return $d;
        }
    )
);

// Include SQL query processing class 
require '../databaseHandler/ssp.class.php';

// Output data as json format 
echo json_encode(
    SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
);
