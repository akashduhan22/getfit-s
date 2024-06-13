<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact_form";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

$sql = "SELECT id, name, email, message FROM messages";
$result = $conn->query($sql);

$messages = array();

if ($result) {
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }
    }
    echo json_encode($messages);
} else {
    echo json_encode(["error" => "Error executing query: " . $conn->error]);
}

$conn->close();
?>
