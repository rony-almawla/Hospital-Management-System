<?php
header('Access-Controll-Allow-Origin:*');
include("connection.php");

$email = $_POST['email'];
$password = $_POST['password'];
$username = $_POST['username'];
$role = $_POST['role'];


$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$query = $mysqli->prepare('insert into users(email,password,username, role) 
values(?,?,?,?)');
$query->bind_param('ssss', $email, $hashed_password, $username, $role);
$query->execute();

$response = [];
$response["status"] = "true";

echo json_encode($response);
