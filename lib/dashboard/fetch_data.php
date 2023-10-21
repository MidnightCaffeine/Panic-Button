<?php
session_start();
include_once '../databaseHandler/connection.php';


if (isset($_POST["fetch"])) {
    $output = array();
    $baler = $pdo->prepare(
        "SELECT * FROM crime_list WHERE municipality = 'Baler'"
    );
    $baler->execute();
    array_push($output, (object)[
        'baler' => $baler->rowCount()
    ]);

    $casiguran = $pdo->prepare(
        "SELECT * FROM crime_list WHERE municipality = 'Casiguran'"
    );
    $casiguran->execute();
    array_push($output, (object)[
        'casiguran' => $casiguran->rowCount()
    ]);

    $dilasag = $pdo->prepare(
        "SELECT * FROM crime_list WHERE municipality = 'Dilasag'"
    );
    $dilasag->execute();
    array_push($output, (object)[
        'dilasag' => $dilasag->rowCount()
    ]);

    $dinalungan = $pdo->prepare(
        "SELECT * FROM crime_list WHERE municipality = 'Dinalungan'"
    );
    $dinalungan->execute();
    array_push($output, (object)[
        'dinalungan' => $dinalungan->rowCount()
    ]);

    $dingalan = $pdo->prepare(
        "SELECT * FROM crime_list WHERE municipality = 'Dingalan'"
    );
    $dingalan->execute();
    array_push($output, (object)[
        'dingalan' => $dingalan->rowCount()
    ]);

    $dipaculao = $pdo->prepare(
        "SELECT * FROM crime_list WHERE municipality = 'Dipaculao'"
    );
    $dipaculao->execute();
    array_push($output, (object)[
        'dipaculao' => $dipaculao->rowCount()
    ]);

    $maria = $pdo->prepare(
        "SELECT * FROM crime_list WHERE municipality = 'Maria Aurora'"
    );
    $maria->execute();
    array_push($output, (object)[
        'maria' => $maria->rowCount()
    ]);

    $sanLuis = $pdo->prepare(
        "SELECT * FROM crime_list WHERE municipality = 'San Luis'"
    );
    $sanLuis->execute();
    array_push($output, (object)[
        'ssanLuis' => $sanLuis->rowCount()
    ]);

    echo json_encode($output);
}
