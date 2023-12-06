<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');

include("../connection.php");

$patient_id = $_POST['patient_id'];


$checkQuery = $mysqli->prepare('SELECT patient_id FROM patients WHERE patient_id = ?');
$checkQuery->bind_param('i', $patient_id);
$checkQuery->execute();
$checkResult = $checkQuery->get_result();

if ($checkResult->num_rows > 0) {
    $deleteQuery = $mysqli->prepare('DELETE FROM patients WHERE patient_id = ?');
$deleteQuery->bind_param('i', $patient_id);
    $deleteQuery->execute();

    $response = [
        "status" => "true",
        "message" => "Patient deleted successfully."
    ];
} else {
    $response = [
        "status" => "false",
        "message" => "Patient not found."
    ];
}

echo json_encode($response);
?>