<?php
// Database connection info 
$dbDetails = array(
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'db'   => 'sos'
);

// DB table to use 
$table = 'client_list';

// Table's primary key 
$primaryKey = 'client_id';

// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array(
    array('db' => 'firstname', 'dt' => 0),
    array('db' => 'lastname',  'dt' => 1),
    array('db' => 'middlename',  'dt' => 2),
    array('db' => 'age',      'dt' => 3),
    array('db' => 'address',      'dt' => 4),
    array('db' => 'device_id',      'dt' => 5),
    array(
        'db'        => 'client_id',
        'dt'        => 6,
        'formatter' => function ($d, $row) {
            $d = '<button type="button" id="'. $d . '" class="btn btn-primary update me-2" name="update"><i class="bi bi-pencil-square"></i></button><button type="button" id="'. $d . '" class="btn btn-danger delete" name="delete"><i class="bi bi-trash"></i></button>';
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
