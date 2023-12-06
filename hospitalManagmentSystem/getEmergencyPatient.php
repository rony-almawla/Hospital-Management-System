<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');

include("../connection.php");

$patient_id = $_POST['patient_id'];

$query = $mysqli->prepare('SELECT name, user_id FROM patients  WHERE patient_id = ?');
$query->bind_param('i', $patient_id);
$query->execute();
$query->store_result();
$query->bind_result($name,$user_id);
$query->fetch();
$response = [];
$response["status"] = "true";
$response["name"]= $name;
$response["user_id"]= $user_id;

echo json_encode($response);

?>
