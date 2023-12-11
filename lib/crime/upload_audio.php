<?php
require_once '../databaseHandler/connection.php';

$valid_extensions = array('wav', 'mp3', 'mp4'); // valid extensions
$path = '../../evidence/'; // upload directory

if (isset($_FILES['image'])) {
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $case_id = $_POST['hidden_caseid'];
    $victim_name = $_POST['hidden_victim_name'];

    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

    // can upload same image using rand function
    $temp = explode(".", $_FILES["image"]["name"]);
    $final_image = 'evidence_for_case_no_' . $case_id . '.' . end($temp);

    // check's valid format
    if (in_array($ext, $valid_extensions)) {

        $path = $path . strtolower($final_image);

        if (move_uploaded_file($tmp, $path)) {
            echo "<img src='$path' />";
        }
    } else {
        echo 'invalid file';
    }
    $insert = $pdo->prepare("INSERT INTO reports(crime_id, victim_name,audio) VALUES(:crime_id, :client_name, :audio)");

    $insert->bindparam('crime_id', $case_id);
    $insert->bindparam('client_name', $victim_name);
    $insert->bindparam('audio', $final_image);
    $insert->execute();
}
