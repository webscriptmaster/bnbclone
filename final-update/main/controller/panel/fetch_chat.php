<?php
include '../../include/global.php';

$id = intval($_GET['id']); // Sanitize input

$query = "SELECT * FROM hosts WHERE id = $id";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $host = mysqli_fetch_assoc($result);

    // Fetch chat messages (you need to adjust this query based on your chat table)
    $chat_query = "SELECT message FROM messages WHERE host_id = $id"; 
    $chat_result = mysqli_query($con, $chat_query);

    $messages = [];
    while ($chat_row = mysqli_fetch_assoc($chat_result)) {
        $messages[] = $chat_row['message'];
    }

    echo json_encode([
        'success' => true,
        'host' => $host,
        'messages' => $messages
    ]);
} else {
    echo json_encode(['success' => false]);
}
?>
