<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');

include("../connection.php");

$doctor_id = $_POST['doctor_id'];


$checkQuery = $mysqli->prepare('SELECT doctor_id FROM doctors WHERE doctor_id = ?');
$checkQuery->bind_param('i', $doctor_id);
$checkQuery->execute();
$checkResult = $checkQuery->get_result();

if ($checkResult->num_rows > 0) {
    $deleteQuery = $mysqli->prepare('DELETE FROM doctors WHERE doctor_id = ?');
$deleteQuery->bind_param('i', $doctor_id);
    $deleteQuery->execute();

    $response = [
        "status" => "true",
        "message" => "Doctor deleted successfully."
    ];
} else {
    $response = [
        "status" => "false",
        "message" => "Doctor not found."
    ];
}

echo json_encode($response);
?>