<?php
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
    array('db' => 'firstname', 'dt' => 0),
    array('db' => 'middlename',  'dt' => 1),
    array('db' => 'lastname',  'dt' => 2),
    array('db' => 'coordinates', 'dt' => 3),
    array('db' => 'date',      'dt' => 4),
    array('db' => 'time',      'dt' => 5),
    array(
        'db'        => 'coordinates',
        'dt'        => 6,
        'formatter' => function ($d, $row) {
            $d = '<a href="https://www.google.com/maps/place/' . $d . '" target="_blank"><i class="bi bi-map"></i> View Location</a>';
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
