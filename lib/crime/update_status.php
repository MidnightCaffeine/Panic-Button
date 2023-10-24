<?php
session_start();
include_once '../databaseHandler/connection.php';


if (isset($_POST['coordinates'])) {
    $coordinates = $_POST['$coordinates'];
    $coor = explode(',', $coordinates);
    $lat = $coor[0];
    $long = $coor[1];


    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://trueway-geocoding.p.rapidapi.com/ReverseGeocode?location=" . $lat . "," . $long . "&language=en",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: trueway-geocoding.p.rapidapi.com",
            "X-RapidAPI-Key: ebea7ffd5cmshe79b65498c3d4ffp1050a9jsne7c3bb7bcf78"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        // echo $response;
        $arr = json_decode($response);
        $locality = strval($arr->results[0]->sublocality);
    }

    $select = $pdo->prepare(
        "SELECT * FROM crime_list"
    );
    $select->execute();
    while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
        $id = $row["crime_id"];

        if ($row["municipality"] == null) {
            $update = $pdo->prepare("UPDATE crime_list SET municipality = $locality WHERE crime_id = :id");
            $update->bindparam('id', $id);

            $update->execute();
        } else {
            echo '<script type="text/javascript">
                Swal.fire({
                    title: "Registration Successful!",
                    text: "You can login to your account now",
                    icon: "error",
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false
                })
                </script>';
        }
    }
}
