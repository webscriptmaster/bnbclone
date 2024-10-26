<?php
header('Content-Type: application/json');

// Database connection
$conn = new mysqli('localhost', 'bnbclone_bnb', 'FUn;aQ?kK1T7', 'bnbclone_bnb');

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]));
}
require '../../vendor/autoload.php';
use ImageKit\ImageKit;

$imageKit = new ImageKit(
    "public_J0sm9HKJUcrMq4I6go/WvCMGVMg=",
    "private_xVHMVW++ZayGKEcs/Yo1AYRxrg4=",
    "https://ik.imagekit.io/9veiy4owl"
);

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
$images = unserialize($row['property_image']);

$upload_dir = "../assets/image_property/";
$upload_errors = [];
$allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
$imagekit_urls = []; 
// for ($i = 0; $i < count($new_images['name']); $i++) {
//     $new_image_name = basename($new_images['name'][$i]);
//     $upload_path = $upload_dir . $new_image_name;

//     if ($new_images['error'][$i] !== UPLOAD_ERR_OK) {
//         $upload_errors[] = "Failed to upload " . $new_images['name'][$i] . ": Error " . $new_images['error'][$i];
//         continue;
//     }

//     if (!move_uploaded_file($new_images['tmp_name'][$i], $upload_path)) {
//         $upload_errors[] = "Failed to move uploaded file " . $new_images['name'][$i];
//         continue;
//     }

//     $images[] = $new_image_name;
// }

for ($i = 0; $i < count($new_images['name']); $i++) {
    $new_image_name = basename($new_images['name'][$i]);
    $upload_path = $upload_dir . $new_image_name;

    // Check if the file is an image
    $file_extension = strtolower(pathinfo($new_image_name, PATHINFO_EXTENSION));
    if (!in_array($file_extension, $allowed_extensions)) {
        $upload_errors[] = "$new_image_name is not a valid image file.";
        continue;
    }

    if ($new_images['error'][$i] !== UPLOAD_ERR_OK) {
        $upload_errors[] = "Failed to upload " . $new_images['name'][$i] . ": Error " . $new_images['error'][$i];
        continue;
    }

    if (!move_uploaded_file($new_images['tmp_name'][$i], $upload_path)) {
        $upload_errors[] = "Failed to move uploaded file " . $new_images['name'][$i];
        continue;
    }

    // Upload to ImageKit
    $upload_response = $imageKit->uploadFile([
        'file' => fopen($upload_path, 'r'),
        'fileName' => $new_image_name,
        'folder' => '/assets/image_property',
    ]);

    if (isset($upload_response->result->url)) { // Check if URL is set
        $imagekit_urls[] = $upload_response->result->url; // Store URL if needed
    } else {
        $upload_errors[] = "Failed to upload to ImageKit: " . json_encode($upload_response);
    }
}


$images_serialized = serialize($images);
if (!empty($imagekit_urls)) {
    // Merge old images with new ones
    $images = array_merge($images, $imagekit_urls);
    $images_serialized = serialize($images); // Serialize again after adding new URLs

    $update_query = "UPDATE property SET property_image = '$images_serialized' WHERE id = '$property_id'";
   
if ($conn->query($update_query) === TRUE) {
    if (empty($upload_errors)) {
        echo json_encode(['status' => 'success']);
    //   header("location:https://trademe-mail.com/controller/panel/properties");
    header("location:./properties.php");
    } else {
        echo json_encode(['status' => 'partial_success', 'message' => 'Some files were not uploaded', 'errors' => $upload_errors]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update database']);
}
}
$conn->close();
?>
