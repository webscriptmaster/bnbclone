<?php

include '../include/global.php';
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if POST data is available
if (isset($_POST['sender_id'], $_POST['receiver_id'], $_POST['message'], $_POST['status'], $_POST['name'])) {
    print_r($_POST);
    $sender_id = $_POST['sender_id'];
    $receiver_id = $_POST['receiver_id'];
    $message = $_POST['message'];
    $status = $_POST['status'];

    $name = $_POST['name'];
    $query = "INSERT INTO messages (sender_id, name,receiver_id,status, message, timestamp) 
    VALUES ('$sender_id','$name', '$receiver_id','$status', '$message', NOW())";
echo $query; // یہ لائن دیکھیں کہ SQL کمانڈ صحیح طور پر بن رہا ہے
$result = mysqli_query($con, $query);
if ($result) {
    echo json_encode(['status' => 'success', 'message' => 'Message sent successfully']);
} else {
    $error = mysqli_error($con);
    echo json_encode(['status' => 'error', 'message' => 'Failed to send message', 'error' => $error]);
}
}
