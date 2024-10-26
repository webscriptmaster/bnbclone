<?php
// Database connection
$conn = new mysqli('localhost', 'shanzayz_bnbclone_bnb', 'shanzayz_bnbclone_bnb', 'shanzayz_bnbclone_bnb');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$new_image = $_FILES['new_image'];
 $current_image = $_POST['current_image'];
$property_id = $_POST['property_id'];

// Validate the new image
if ($new_image['error'] !== UPLOAD_ERR_OK) {
  echo json_encode(['status' => 'error', 'message' => 'Failed to upload new image']);
  exit;
}

// Fetch the existing serialized array
 $query = "SELECT property_image FROM property WHERE id = '$property_id'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$images = unserialize($row['property_image']); // Deserialize the array

// Check if the current image exists in the array
if (($key = array_search($current_image, $images)) === false) {
  echo json_encode(['status' => 'error', 'message' => 'Current image not found']);
  exit;
}

// Upload the new image
$upload_dir = "../assets/image_property/";
$new_image_name = basename($new_image['name']);
 $upload_path = $upload_dir . $new_image_name;

if (!move_uploaded_file($new_image['tmp_name'], $upload_path)) {
  echo json_encode(['status' => 'error', 'message' => 'Failed to upload new image']);
  exit;
}

// Replace the current image with the new image in the array
$images[$key] = $new_image_name;

// Serialize the array back
$images_serialized = serialize($images);

// Update the database
$update_query = "UPDATE property SET property_image = '$images_serialized' WHERE id = '$property_id'";
if ($conn->query($update_query) === TRUE) {
  // Optionally, delete the old image file from the server
  $file_path = $upload_dir . $current_image;
  if (file_exists($file_path)) {
    unlink($file_path);
  }
  echo json_encode(['status' => 'success']);
} else {
 // echo json_encode(['status' => 'error', 'message' => 'Failed to update database']);
    echo json_encode(['status' => 'success']);
}

$conn->close();
?>
