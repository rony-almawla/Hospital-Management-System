<?php
header('Access-Controll-Allow-Origin:*');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods:  GET, POST, OPTIONS');
include("connection.php");
$email = $_POST['email'];
$password = $_POST['password'];
$query=$mysqli->prepare('select user_id,username,password from users where email=?');
$query->bind_param('s',$email);
$query->execute();
$query->store_result();
$num_rows=$query->num_rows;
$query->bind_result($user_id,$username,$hashed_password);
$query->fetch();


$response=[];
if($num_rows== 0){
    $response['status']= 'user not found';
    echo json_encode($response);
} else {
    if(password_verify($password,$hashed_password)){
        $response['status']= 'logged in';
        $response['user_id']=$user_id;
        $response['username']=$username;
        echo json_encode($response);
    } else {
        $response['status']= 'wrong credentials';
        echo json_encode($response);
    }
};