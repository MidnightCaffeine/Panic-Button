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
$table = 'crime_list';

// Table's primary key 
$primaryKey = 'crime_id';

// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array(
    array('db' => 'crime_id', 'dt' => 0),
    array('db' => 'name', 'dt' => 1),
    array('db' => 'coordinates',  'dt' => 2),
    array('db' => 'municipality',  'dt' => 3),
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
        'db'        => 'coordinates',
        'dt'        => 6,
        'formatter' => function ($d, $row) {
            $d = '
            
            <button type="button" id="' . $d . '" class="btn btn-primary setLocation"><i class="bi bi-map"></i> View Location</button>
            ';
            return $d;
        }
    ),
    array(
        'db'        => 'crime_id',
        'dt'        => 7,
        'formatter' => function ($d, $row) {
            $d = '
            <button type="button" id="' . $d . '" class="btn btn-primary uploadAudio">
                <i class="bi bi-clipboard-check"></i> Upload Audio
            </button>
            ';
            return $d;
        }
    ),
    array(
        'db'        => 'crime_id',
        'dt'        => 8,
        'formatter' => function ($d, $row) {
            $d = '
            <button type="button" id="' . $d . '" class="btn btn-primary addReport">
                <i class="bi bi-clipboard-check"></i> Submit Report
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
    SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, null, "status='0' or status='2'")
);
