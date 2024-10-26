<?php
header('Content-Type: application/json');

// Database connection
$conn = new mysqli('localhost', 'tradckdh_bnb', 'qweQWE123!@#', 'tradckdh_bnb');

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]));
}

$property_id = $_POST['iddd'];
$new_images = $_FILES['files'];

if (empty($new_images['name'][0])) {
    echo json_encode(['status' => 'error', 'message' => 'No files were uploaded.']);
    exit;
}

$query = "SELECT property_image FROM property WHERE id = '$property_id'";
$result = $conn->query($query);

if (!$result) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to fetch property images']);
    exit;
}

$row = $result->fetch_assoc();
$images = unserialize($row['property_image']); // Deserialize the array

$upload_dir = "../assets/image_property/";
$upload_errors = [];

for ($i = 0; $i < count($new_images['name']); $i++) {
    $new_image_name = basename($new_images['name'][$i]);
    $upload_path = $upload_dir . $new_image_name;

    if ($new_images['error'][$i] !== UPLOAD_ERR_OK) {
        $upload_errors[] = "Failed to upload " . $new_images['name'][$i] . ": Error " . $new_images['error'][$i];
        continue;
    }

    if (!move_uploaded_file($new_images['tmp_name'][$i], $upload_path)) {
        $upload_errors[] = "Failed to move uploaded file " . $new_images['name'][$i];
        continue;
    }

    $images[] = $new_image_name;
}


$images_serialized = serialize($images);

$update_query = "UPDATE property SET property_image = '$images_serialized' WHERE id = '$property_id'";
if ($conn->query($update_query) === TRUE) {
    if (empty($upload_errors)) {
        //echo json_encode(['status' => 'success']);
      header("location:https://trademe-mail.com/controller/panel/properties");
    } else {
        echo json_encode(['status' => 'partial_success', 'message' => 'Some files were not uploaded', 'errors' => $upload_errors]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update database']);
}

$conn->close();
?>
