<?php
// Include your database connection file
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
include("../connection.php");

// Assuming you have received the updated values from a form or another source
$patient_id = $_POST['patient_id'];
$name = $_POST['name'];

// Prepare and execute the UPDATE query
$query = $mysqli->prepare('UPDATE patients SET name=? WHERE patient_id = ?');
$query->bind_param('si', $name, $patient_id);
$result = $query->execute();

// Check if the update was successful
if ($result) {
    echo "Update successful";
} else {
    echo "Error updating record: " . $mysqli->error;
}

// Close the prepared statement
$query->close();

// Close the database connection
$mysqli->close();
?>