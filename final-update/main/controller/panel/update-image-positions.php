<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
header('Content-Type: application/json');

// Database connection
$conn = new mysqli('localhost', 'root', '', 'bnbclone_bnb');

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]));
}

$property_id = isset($_POST['iddd']) ? $_POST['iddd'] : null;
$new_image_positions = isset($_POST['images']) ? $_POST['images'] : [];

if ($property_id === null || empty($new_image_positions)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid property ID or images']);
    exit;
}

// Fetch the existing serialized array
$query = "SELECT property_image FROM property WHERE id = '$property_id'";
$result = $conn->query($query);

if (!$result) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to fetch property images']);
    exit;
}

$row = $result->fetch_assoc();
$existing_images = unserialize($row['property_image']); // Deserialize the array

// Update the image positions based on the new order
$new_images = [];
foreach ($new_image_positions as $image) {
    if (in_array($image, $existing_images)) {
        $new_images[] = $image;
    }
}

$images_serialized = serialize($new_images);

$update_query = "UPDATE property SET property_image = '$images_serialized' WHERE id = '$property_id'";
if ($conn->query($update_query) === TRUE) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update database']);
}

$conn->close();
?>
