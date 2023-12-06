<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');

include("../connection.php");

$name= $_POST['name'];
$specialization = $_POST['specialization'];
$user_id = $_POST['user_id'];

$query = $mysqli->prepare('INSERT INTO doctors (name, specialization, user_id) values(?,?,?)');
$query->bind_param('ssi', $name, $specialization, $user_id);
$query->execute();

$response = [];
$response["status"] = "true";

echo json_encode($response);

?>


