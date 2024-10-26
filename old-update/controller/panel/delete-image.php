<?php
// Database connection
$conn = new mysqli('localhost', 'tradckdh_bnb', 'qweQWE123!@#', 'tradckdh_bnb');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$images = $_POST['images'];

//print_r($images);

 $property_id = $_POST['property_id'];

// Fetch the existing serialized array
$query = "SELECT property_image FROM property WHERE id = '$property_id'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$existing_images = unserialize($row['property_image']); // Deserialize the array

if (!is_array($images)) {
    // If a single image, convert it to an array
    $images = array($images);
}

// Remove the images from the array
foreach ($images as $image) {
    //echo $image;
    if (($key = array_search($image, $existing_images)) !== false) {
        
        unset($existing_images[$key]);
    }
}

// Serialize the array back
$images_serialized = serialize($existing_images);


///print_r($images_serialized);


// Update the database
$update_query = "UPDATE property SET property_image = '$images_serialized' WHERE id = '$property_id'";
if ($conn->query($update_query) === TRUE) {
    // Optionally, delete the files from the server
    foreach ($images as $image) {
        $file_path = "../assets/image_property/" . $image;
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }
    echo 'success';
} else {
    echo 'error';
}

$conn->close();
?>
