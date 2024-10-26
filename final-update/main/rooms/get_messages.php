<?php
include '../include/global.php';

$sender_id = $_GET['sender_id'] ?? null;
$receiver_id = $_GET['receiver_id'] ?? null;

if ($sender_id && $receiver_id) {
    $query = "SELECT * FROM messages WHERE (sender_id = '$sender_id' AND receiver_id = '$receiver_id') 
              OR (sender_id = '$receiver_id' AND receiver_id = '$sender_id') ORDER BY timestamp ASC";
    $result = mysqli_query($con, $query);
    $messages = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $messages[] = $row;
    }
    echo json_encode($messages);
}
?>
