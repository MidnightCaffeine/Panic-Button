<?php

function getAddress($coordinates)
{
    // $coordinates = $lat.','.$long;
    
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://trueway-geocoding.p.rapidapi.com/ReverseGeocode?location=" . $coordinates . "&language=en",
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
        $data = json_decode($response, true);
        return strval($data['results'][0]['locality']);
    }
}
function loc($lat,$long)
{
    $coordinates = $lat.','.$long;
    
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://trueway-geocoding.p.rapidapi.com/ReverseGeocode?location=" . $coordinates . "&language=en",
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
        $data = json_decode($response, true);
        return strval($data['results'][0]['locality']);
    }
}
