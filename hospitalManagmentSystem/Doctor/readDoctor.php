<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');

include("../connection.php");

$doctor_id = $_POST['doctor_id'];

$query = $mysqli->prepare('SELECT name, specialization, user_id FROM doctors  WHERE doctor_id = ?');
$query->bind_param('i', $doctor_id);
$query->execute();
$query->store_result();
$query->bind_result($name,$specialization,$user_id);
$query->fetch();
$response = [];
$response["status"] = "true";
$response["name"]= $name;
$response["specialization"]= $specialization;
$response["user_id"]= $user_id;

echo json_encode($response);

?>
