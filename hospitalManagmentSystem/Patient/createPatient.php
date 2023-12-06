<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');

include("../connection.php");

$name= $_POST['name'];

$query = $mysqli->prepare('INSERT INTO patients (name) values(?)');
$query->bind_param('s', $name);
$query->execute();

$response = [];
$response["status"] = "true";

echo json_encode($response);

?>


