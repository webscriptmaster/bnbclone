<?php
include '../../include/global.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch messages where status is 'user' and sent in the last hour
$sql = "SELECT name, status, message,receiver_id FROM messages WHERE status = 'user' AND timestamp >= NOW() - INTERVAL 1 HOUR"; 
$result = $con->query($sql);

$messages = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
} else {
    error_log("SQL error: " . $con->error);
}

$con->close();

// Return messages as JSON
header('Content-Type: application/json');
echo json_encode($messages);
?>
