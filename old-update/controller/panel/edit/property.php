<?php

include '../../../include/global.php';

if(!session()) redirect('../../');

$id = $_GET['id'] ?? null;

if(!$id) redirect('../../');

$property = fetch_data("SELECT * FROM property WHERE id = '$id'");

if(!$property) redirect('../../');

if (isset($_POST['edit_property'])) {

    $file = $_FILES['file'];
    $type = sanitize($_POST['type']) ?? null;
    $title = sanitize($_POST['title']) ?? null;
    $address = sanitize($_POST['address']) ?? null;
    $city = sanitize($_POST['city']) ?? null;
    $state = sanitize($_POST['state']) ?? null;
    $zip = sanitize($_POST['zip']) ?? null;
    $guests = sanitize($_POST['guests']) ?? null;
    $bedrooms = sanitize($_POST['bedrooms']) ?? null;
    $beds = sanitize($_POST['beds']) ?? null;
    $bathrooms = sanitize($_POST['bathrooms']) ?? null;
    $space = sanitize($_POST['space']) ?? null;
    $nightly_fee = sanitize($_POST['nightly_fee']) ?? 0;
    $monthly_fee = sanitize($_POST['monthly_fee']) ?? 0;
    $cleaning_fee = sanitize($_POST['cleaning_fee']) ?? 0;
    $service_fee_type = sanitize($_POST['service_fee_type']) ?? '';
    $service_fee_total = sanitize($_POST['service_fee_total']) ?? 0;
    $tourist_fee_type = sanitize($_POST['tourist_fee_type']) ?? '';
    $tourist_fee_total = sanitize($_POST['tourist_fee_total']) ?? 0;
    $reviews_to_show = sanitize($_POST['reviews_to_show']) ?? 0;
    $communication = sanitize($_POST['communication']) ?? 10;
    $facilities = sanitize($_POST['facilities']) ?? 10;
    $cleanliness = sanitize($_POST['cleanliness']) ?? 10;
    $comfort = sanitize($_POST['comfort']) ?? 10;
    $value_for_money = sanitize($_POST['value_for_money']) ?? 10;
    $location = sanitize($_POST['location']) ?? 10;
    $min_nights = sanitize($_POST['min_nights']) ?? 3;
    $min_months = sanitize($_POST['min_months']) ?? 2;
    $neighborhood = sanitize($_POST['neighborhood']) ?? '';
    $description = sanitize($_POST['description']) ?? '';
    $house_rules = sanitize($_POST['house_rules']) ?? '';
    $safety_property = sanitize($_POST['safety_property']) ?? '';
    $cancelation_policy = sanitize($_POST['cancelation_policy']) ?? '';
    $refund_details = sanitize($_POST['refund_details']) ?? '';
    
    $country_desc = sanitize($_POST['country_desc']) ?? '';
    
    $errors = array();

    if (empty($type)) {
        $errors[] = "Type is required.";
    }

    if (empty($title)) {
        $errors[] = "Title is required.";
    }

    if (empty($address)) {
        $errors[] = "Address is required.";
    }

    if (empty($city)) {
        $errors[] = "City is required.";
    }

    if (empty($state)) {
        $errors[] = "State is required.";
    }

    if (empty($zip)) {
        $errors[] = "Zip is required.";
    }

    if (empty($guests)) {
        $errors[] = "Number of guests is required.";
    }

    if (empty($bedrooms)) {
        $errors[] = "Number of bedrooms is required.";
    }

    if (empty($beds)) {
        $errors[] = "Number of beds is required.";
    }

    if (empty($bathrooms)) {
        $errors[] = "Number of bathrooms is required.";
    }

    if (!is_numeric($nightly_fee) || $nightly_fee < 0) {
        $errors[] = "Nightly Rate must be a valid positive number.";
    }

    if (!is_numeric($monthly_fee) || $monthly_fee < 0) {
        $errors[] = "Monthly Rate must be a valid positive number.";
    }

    if (!is_numeric($cleaning_fee) || $cleaning_fee < 0) {
        $errors[] = "Cleaning Fee must be a valid positive number.";
    }

    if ($service_fee_type === '') {
        $errors[] = "Please select Service Fee Type.";
    }

    if (!is_numeric($service_fee_total) || $service_fee_total < 0) {
        $errors[] = "Service Fee must be a valid positive number.";
    }

    if ($tourist_fee_type === '') {
        $errors[] = "Please select Tourist/Lodging Fee Type.";
    }

    if (!is_numeric($tourist_fee_total) || $tourist_fee_total < 0) {
        $errors[] = "Tourist/Lodging Fee must be a valid positive number.";
    }

    if (!is_numeric($reviews_to_show) || $reviews_to_show < 0 || $reviews_to_show > 50) {
        $errors[] = "Number of reviews to show must be a number between 0 and 50.";
    }

    $criteria = ['communication', 'facilities', 'cleanliness', 'comfort', 'value_for_money', 'location'];
    foreach ($criteria as $criterion) {
        if (!is_numeric($_POST[$criterion]) || $_POST[$criterion] < 0 || $_POST[$criterion] > 10) {
            $errors[] = ucfirst($criterion) . " must be a number between 0 and 10.";
        }
    }

    if (!is_numeric($min_nights) || $min_nights < 0) {
        $errors[] = "Minimum nights must be a positive number.";
    }

    if (!is_numeric($min_months) || $min_months < 0) {
        $errors[] = "Minimum months must be a positive number.";
    }

    $max_text_length = 1000;
    if (strlen($neighborhood) > $max_text_length) {
        $errors[] = "Neighborhood description exceeds maximum length of {$max_text_length} characters.";
    }

    if (empty($description)) {
        $errors[] = "Description is required.";
    }

    if(empty($file['name'])){
        $errors[] = "Please upload the profile image.";
    }

    if (!empty($file['name'])) {
        $allowed_types = array('image/jpeg', 'image/jpg', 'image/png');
        if (!in_array($file['type'], $allowed_types)) {
            $errors[] = "Unsupported file type. Only JPEG, JPG, PNG files are allowed.";
        }
    }

    $upload_dir = '../../assets/image_property/';

    // if(!empty($file['name'])){

    //     $file_name = $_FILES['file']['name'];
    //     $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    //     $unique_file_name = uniqid() . '_' . bin2hex(random_bytes(8)) . '.' . $file_ext;

    //     $file_tmp_name = $_FILES['file']['tmp_name'];
        
    //     if (!empty($file_name)) {
    //         $upload_path = $upload_dir . $unique_file_name;
    //         if (!move_uploaded_file($file_tmp_name, $upload_path)) {
    //             $errors[] = "Error uploading the image.";
    //         }
    //     } 

    // }


    $upload_dir = '../../assets/image_property/';
$uploaded_files = [];

if (!empty($_FILES['files']['name'][0])) {
    foreach ($_FILES['files']['name'] as $key => $file_name) {
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $unique_file_name = uniqid() .'_'.bin2hex(random_bytes(8)). '-' . ($key + 1) . '.' . $file_ext;

        $file_tmp_name = $_FILES['files']['tmp_name'][$key];
        $upload_path = $upload_dir . $unique_file_name;

        if (move_uploaded_file($file_tmp_name, $upload_path)) {
            $uploaded_files[] = $unique_file_name;
        } else {
            $errors[] = "Error uploading the image: $file_name";
        }
    }
}


$unique_file_name = serialize($uploaded_files);


    if (!empty($errors) || $errors == null) {
    
         $update = "UPDATE `property` 
        SET 
            `property_name` = '$title',
            `property_type` = '$type',
            `property_image` = '$unique_file_name', 
            `address` = '$address',
            `city` = '$city',
            `state` = '$state',
            `country_desc`='$country_desc',
            `zip` = '$zip',
            `guests_included` = '$guests',
            `bedrooms` = '$bedrooms',
            `beds` = '$beds',
            `bathrooms` = '$bathrooms',
            `space` = '$space',
            `nightly_fee` = '$nightly_fee',
            `monthly_fee` = '$monthly_fee',
            `cleaning_fee` = '$cleaning_fee',
            `service_fee_type` = '$service_fee_type',
            `service_fee_total` = '$service_fee_total',
            `tourist_fee_type` = '$tourist_fee_type',
            `tourist_fee_total` = '$tourist_fee_total',
            `reviews_to_show` = '$reviews_to_show',
            `communication` = '$communication',
            `facilities` = '$facilities',
            `cleanliness` = '$cleanliness',
            `comfort` = '$comfort',
            `value_for_money` = '$value_for_money',
            `location` = '$location',
            `min_nights` = '$min_nights',
            `min_months` = '$min_months',
            `neighborhood` = '$neighborhood',
            `description` = '$description',
            `house_rules` = '$house_rules',
            `safety_property` = '$safety_property',
            `cancelation_policy` = '$cancelation_policy',
            `refund_details` = '$refund_details'
        WHERE 
            `id` = '$id'";

        $update = update_data($update);

        if($update){
            $success = 'Successfully updated Property, ID: '.$id;
            unset($_POST);
            unset($errors);
            header("Location: " . $_SERVER['REQUEST_URI']);
        }else{
            $errors[] = "Update of {Property} database failed, please try again later.";
        }    

    } else {
        $errors = implode(', ', $errors);
    }
}

if(isset($_GET['action']) && $_GET['action'] == 'delete'){

    $delete = delete_data("DELETE FROM property WHERE id = '$id'");
    
    if($delete){
        header('location: ../properties');
        exit;
    } else {
        $errors[] = "Deleting this host failed, try again later.";
    }

}

  
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title><?=site('name');?></title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="../../assets/vendors/core/core.css">
	<!-- endinject -->

	<!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../assets/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../assets/vendors/easymde/easymde.min.css">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="../../assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="../../assets/css/demo2/style.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- End layout styles -->

  <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<div class="main-wrapper">

		<?=load('panel/sidebar');?>
	
		<div class="page-wrapper">
					
			<?=load('panel/header');?>

			<div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0 text-dark"><?=site('name')?> Panel</h4>
          </div>
        </div>

        <?=$success ? '<div class="alert alert-success">'.$success.'</div>' : ''?>
        <?php
            if (!empty($errors)) {
                $error_message = implode(', ', $errors);
                echo '<div class="alert alert-danger">' . $error_message . '</div>';
            }
        ?>
        <form id="upload-form" enctype="multipart/form-data" method="post">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-sm-12">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header bg-primary d-flex justify-content-between">
                        <span class="text-uppercase font-weight-semibold">📍 Location</span>
                    </div>
                    <div class="card-body">
                        <div class="form-group row select required">
                            <div class="p-3 pb-0">
                                <div class="row col-lg-12">

                                    <style>
                                        * {
                                        box-sizing: border-box;
                                        -moz-box-sizing: border-box;
                                        -webkit-box-sizing: border-box;
                                        }
                                    
                                        .upload-container {
                                        background-color: #000;
                                        color: #fff;
                                        border-radius: 6px;
                                        padding: 10px;
                                        text-align: center;
                                        }

                                        .border-container {
                                        border: 5px dashed rgba(198, 198, 198, 0.65);
                                        /*   border-radius: 4px; */
                                        padding: 20px;
                                        }

                                        .border-container p {
                                        color: #fff;
                                        font-weight: 600;
                                        font-size: 1.1em;
                                        letter-spacing: -1px;
                                        margin-top: 30px;
                                        margin-bottom: 0;
                                        opacity: 0.65;
                                        }

                                        #file-browser {
                                        text-decoration: none;
                                        color: rgb(22,42,255);
                                        border-bottom: 3px dotted rgba(22, 22, 255, 0.85);
                                        }

                                        #file-browser:hover {
                                        color: rgb(0, 0, 255);
                                        border-bottom: 3px dotted rgba(0, 0, 255, 0.85);
                                        }

                                        .icons {
                                        color: #95afc0;
                                        opacity: 0.55;
                                        }

                                        .border-container {
                                            border: 2px dashed #ccc;
                                            padding: 20px;
                                            text-align: center;
                                            transition: border .3s ease;
                                        }

                                        .icons {
                                            margin-top: 20px;
                                        }

                                        #file-name {
                                            margin-top: 10px;
                                        }

                                        #drop-area.drag-over {
                                            border-color: #007bff;
                                        }
                                    </style>

                                    <div class="row mb-3">
    <label class="col-md-2 col-form-label">Property Images</label>
    <div class="col-md-10 col-lg-4">
        <div class="upload-container">
            <div id="drop-area" class="border-container">
                <div class="icons fa-4x">
                    <i class="fas fa-file-image" data-fa-transform="shrink-3 down-2 left-6 rotate--45"></i>
                    <i class="fas fa-file-alt" data-fa-transform="shrink-2 up-4"></i>
                </div>
                <p>Drag and drop files here, or <a href="#" id="file-browser">browse</a> your computer.</p>
                <input type="file" id="file-input" name="files[]" accept="image/jpeg, image/jpg, image/png" multiple style="display: none;">
                <div id="file-names"></div>
                <?php if($property['property_image']) { ?>
                    <p>Uploaded image:</p>
                    <img src="../../assets/image_property/<?=$property['property_image']?>" width="250">
                <?php } ?>
            </div>
        </div>
        <div id="error-image" class="alert alert-danger" style="display:none;">
            <i class="fas fa-exclamation-circle" aria-hidden="true"></i> <span id="error-message"></span>
        </div>
    </div> 
</div>

<script>
    function handleFileSelect(files) {
        const fileNamesDiv = document.getElementById('file-names');
        fileNamesDiv.innerHTML = '';

        for (const file of files) {
            if (['image/jpeg', 'image/jpg', 'image/png'].indexOf(file.type) === -1) {
                document.getElementById('error-message').textContent = 'Unsupported file type! Please select JPG, JPEG or PNG images.';
                document.getElementById('error-image').style.display = 'block';
                return;
            }

            const fileNameElement = document.createElement('p');
            fileNameElement.textContent = `File uploading: ${file.name}`;
            fileNamesDiv.appendChild(fileNameElement);

            // Simulate upload time
            setTimeout(() => {
                fileNameElement.textContent = `Uploaded image: ${file.name}`;
                fileNameElement.style.color = 'green';
            }, 2000);
        }
    }

    document.getElementById('file-input').addEventListener('change', function(event) {
        const files = event.target.files;
        document.getElementById('error-image').style.display = 'none';
        handleFileSelect(files);
    });

    document.getElementById('file-browser').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('file-input').click();
    });

    const dropArea = document.getElementById('drop-area');

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(event) {
        event.preventDefault();
        event.stopPropagation();
    }

    dropArea.addEventListener('dragenter', highlight, false);
    dropArea.addEventListener('dragover', highlight, false);
    dropArea.addEventListener('dragleave', unhighlight, false);
    dropArea.addEventListener('drop', handleDrop, false);

    function highlight() {
        dropArea.classList.add('drag-over');
    }

    function unhighlight() {
        dropArea.classList.remove('drag-over');
    }

    function handleDrop(event) {
        document.getElementById('error-image').style.display = 'none';
        const dt = event.dataTransfer;
        const files = dt.files;

        if (files.length > 0) {
            handleFileSelect(files);
            document.getElementById('file-input').files = files;
        }
    }
</script>


                                    <div class="mb-3 col-lg-4">
                                        <label class="col-md-2 col-form-label">Type</label>
                                        <div class="">
                                            <select class="form-control select required" style="width: 100%;" name="type" required>
                                                <option value="">Select Type...</option>
                                                <option <?=($property['property_type'] == 'Apartment') ? 'selected' : ''; ?> value="Apartment">Apartment</option>
                                                <option <?=($property['property_type'] == 'Condominium') ? 'selected' : ''; ?> value="Condominium">Condominium</option>
                                                <option <?=($property['property_type'] == 'Guesthouse') ? 'selected' : ''; ?> value="Guesthouse">Guesthouse</option>
                                                <option <?=($property['property_type'] == 'House') ? 'selected' : ''; ?> value="House">House</option>
                                                <option <?=($property['property_type'] == 'Guest suite') ? 'selected' : ''; ?> value="Guest suite">Guest suite</option>
                                                <option <?=($property['property_type'] == 'Townhouse') ? 'selected' : ''; ?> value="Townhouse">Townhouse</option>
                                                <option <?=($property['property_type'] == 'Vacation home') ? 'selected' : ''; ?> value="Vacation home">Vacation home</option>
                                                <option <?=($property['property_type'] == 'Boat') ? 'selected' : ''; ?> value="Boat">Boat</option>
                                                <option <?=($property['property_type'] == 'Bungalow') ? 'selected' : ''; ?> value="Bungalow">Bungalow</option>
                                                <option <?=($property['property_type'] == 'Cabin') ? 'selected' : ''; ?> value="Cabin">Cabin</option>
                                                <option <?=($property['property_type'] == 'Castle') ? 'selected' : ''; ?> value="Castle">Castle</option>
                                                <option <?=($property['property_type'] == 'Cave') ? 'selected' : ''; ?> value="Cave">Cave</option>
                                                <option <?=($property['property_type'] == 'Chalet') ? 'selected' : ''; ?> value="Chalet">Chalet</option>
                                                <option <?=($property['property_type'] == 'Dorm') ? 'selected' : ''; ?> value="Dorm">Dorm</option>
                                                <option <?=($property['property_type'] == 'Earth House') ? 'selected' : ''; ?> value="Earth House">Earth House</option>
                                                <option <?=($property['property_type'] == 'Hut') ? 'selected' : ''; ?> value="Hut">Hut</option>
                                                <option <?=($property['property_type'] == 'Igloo') ? 'selected' : ''; ?> value="Igloo">Igloo</option>
                                                <option <?=($property['property_type'] == 'Island') ? 'selected' : ''; ?> value="Island">Island</option>
                                                <option <?=($property['property_type'] == 'Lighthouse') ? 'selected' : ''; ?> value="Lighthouse">Lighthouse</option>
                                                <option <?=($property['property_type'] == 'Loft') ? 'selected' : ''; ?> value="Loft">Loft</option>
                                                <option <?=($property['property_type'] == 'Plane') ? 'selected' : ''; ?> value="Plane">Plane</option>
                                                <option <?=($property['property_type'] == 'Camper/RV') ? 'selected' : ''; ?> value="Camper/RV">Camper/RV</option>
                                                <option <?=($property['property_type'] == 'Tent') ? 'selected' : ''; ?> value="Tent">Tent</option>
                                                <option <?=($property['property_type'] == 'Tipi') ? 'selected' : ''; ?> value="Tipi">Tipi</option>
                                                <option <?=($property['property_type'] == 'Train') ? 'selected' : ''; ?> value="Train">Train</option>
                                                <option <?=($property['property_type'] == 'Treehouse') ? 'selected' : ''; ?> value="Treehouse">Treehouse</option>
                                                <option <?=($property['property_type'] == 'Villa') ? 'selected' : ''; ?> value="Villa">Villa</option>
                                                <option <?=($property['property_type'] == 'Yurt') ? 'selected' : ''; ?> value="Yurt">Yurt</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-lg-8">
                                        <label class="col-md-2 col-form-label">Title</label>
                                        <div class="">
                                            <input class="form-control" type="text" name="title" value="<?=$property['property_name']; ?>" placeholder="Enter your property main title...">
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="mb-3">
                                    <label class="col-md-2 col-form-label">Street Address</label>
                                    <div class="">
                                        <input class="form-control" type="text" name="address" value="<?=$property['address']; ?>" placeholder="Main, Str 902">
                                    </div>
                                </div>
                                
                                  <div class="mb-3">
                                    <label class="col-md-2 col-form-label">City Descripiton</label>
                                    <div class="">
                                        <input class="form-control" type="text" name="country_desc" value="<?=$property['country_desc']; ?>" placeholder="Main, Str 902">
                                    </div>
                                </div>
                                
                                <hr/>
                                <div class="row col-lg-12">
                                    <div class="mb-3 col-lg-4">
                                        <label class="col-md-2 col-form-label">City</label>
                                        <div class="">
                                            <input class="form-control" type="text" name="city" value="<?=$property['city']; ?>" placeholder="Sri Lanka">
                                        </div>
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <label class="col-md-2 col-form-label">State</label>
                                        <div class="">
                                            <input class="form-control" type="text" name="state" value="<?=$property['state']; ?>" placeholder="Colombo">
                                        </div>
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <label class="col-md-2 col-form-label">Zip</label>
                                        <div class="">
                                            <input class="form-control" type="text" name="zip" value="<?=$property['zip']; ?>" placeholder="ZE 25">
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row col-lg-12">
                                    <div class="mb-3 col-lg-3">
                                        <label class="col-md-2 col-form-label" style="white-space: nowrap;">Guests</label>
                                        <div class="">
                                            <select class="form-control select required" style="width: 100%;" name="guests" required>
                                                <?php for ($i = 1; $i <= 100; $i++) : ?>
                                                    <option <?=($property['guests_included'] == $i) ? 'selected' : ''; ?> value="<?=$i; ?>"><?=$i; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="col-md-2 col-form-label" style="white-space: nowrap;">Bedrooms</label>
                                        <div class="">
                                            <select class="form-control select required" style="width: 100%;" name="bedrooms" required>
                                                <?php for ($i = 1; $i <= 50; $i++) : ?>
                                                    <option <?=($property['bedrooms'] == $i) ? 'selected' : ''; ?> value="<?=$i; ?>"><?=$i; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="col-md-2 col-form-label" style="white-space: nowrap;">Beds</label>
                                        <div class="">
                                            <select class="form-control select required" style="width: 100%;" name="beds" required>
                                                <?php for ($i = 0; $i <= 100; $i++) : ?>
                                                    <option <?=($property['beds'] == $i) ? 'selected' : ''; ?> value="<?=$i; ?>"><?=$i; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="col-md-2 col-form-label" style="white-space: nowrap;">Bathrooms</label>
                                        <div class="">
                                            <select class="form-control select required" style="width: 100%;" name="bathrooms" required>
                                                <?php
                                                $bathroom_options = array(0, 1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 8.5, 9, 9.5, 10, 10.5, 11, 11.5, 12, 12.5, 13, 13.5, 14, 14.5, 15, 15.5);
                                                foreach ($bathroom_options as $option) :
                                                ?>
                                                    <option <?=($property['bathrooms'] == $option) ? 'selected' : ''; ?> value="<?=$option; ?>"><?=$option; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <br/>
            <div class="col-md-12">
                <div class="card">
                <div class="card-header bg-primary d-flex justify-content-between">
                    <span class="text-uppercase font-weight-semibold">📝 Taxes</span>
                </div>
                <div class="card-body">
                    <div class="form-group row select required">
                        <div class="p-3 pb-0">
                            <div class="row col-lg-12">
                                <div class="mb-3 col-lg-4">
                                    <label class="col-md-2 col-form-label" style="white-space: nowrap;">Nightly Rate</label>
                                    <div class="">
                                        <input class="form-control" type="text" name="nightly_fee" value="<?=isset($property['nightly_fee']) ? $property['nightly_fee'] : '0'; ?>">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <label class="col-md-2 col-form-label" style="white-space: nowrap;">Monthly Rate</label>
                                    <div class="">
                                        <input class="form-control" type="text" name="monthly_fee" value="<?=isset($property['monthly_fee']) ? $property['monthly_fee'] : '0'; ?>">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <label class="col-md-2 col-form-label" style="white-space: nowrap;">Cleaning Fee</label>
                                    <div class="">
                                        <input class="form-control" type="text" name="cleaning_fee" value="<?=isset($property['cleaning_fee']) ? $property['cleaning_fee'] : '0'; ?>">
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row col-lg-12">
                                <div class="mb-3 col-lg-8">
                                    <label class="col-md-2 col-form-label">Service Fee Kind</label>
                                    <select class="form-control select required" style="width: 100%;" name="service_fee_type" required>
                                        <option value="">Select if service fee is percentage based or fixed value...</option>
                                        <option value="percentage" <?=isset($property['service_fee_type']) && $property['service_fee_type'] == 'percentage' ? 'selected' : ''; ?>>Percentage calculated from total without deposit and cleaning fee</option>
                                        <option value="fixed" <?=isset($property['service_fee_type']) && $property['service_fee_type'] == 'fixed' ? 'selected' : ''; ?>>Fixed service fee value</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <label class="col-md-2 col-form-label" style="white-space: nowrap;">Service Fee</label>
                                    <div class="">
                                        <input class="form-control" type="text" name="service_fee_total" value="<?=isset($property['service_fee_total']) ? $property['service_fee_total'] : '0'; ?>">
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row col-lg-12">
                                <div class="mb-3 col-lg-8">
                                    <label class="col-md-2 col-form-label" style="white-space: nowrap;">Tourist/Lodging fee kind</label>
                                    <select class="form-control select required" style="width: 100%;" name="tourist_fee_type" required>
                                        <option value="">Select if tourist/lodging fee is percentage based or fixed value...</option>
                                        <option value="percentage" <?=isset($property['tourist_fee_type']) && $property['tourist_fee_type'] == 'percentage' ? 'selected' : ''; ?>>Percentage calculated from total without deposit and cleaning fee</option>
                                        <option value="fixed" <?=isset($property['tourist_fee_type']) && $property['tourist_fee_type'] == 'fixed' ? 'selected' : ''; ?>>Fixed tourist/lodging fee value</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <label class="col-md-2 col-form-label" style="white-space: nowrap;">Tourist Fee</label>
                                    <div class="">
                                        <input class="form-control" type="text" name="tourist_fee_total" value="<?=isset($property['tourist_fee_total']) ? $property['tourist_fee_total'] : '0'; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
          </div>
		</div>
    </div>
    <br/>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary d-flex justify-content-between">
                    <span class="text-uppercase font-weight-semibold">⭐ REVIEWS</span>
                </div>
                <div class="card-body">
                    <div class="form-group row select required">
                        <div class="p-3 pb-0">
                            <div class="mb-3 col-md-10">
                                <label class="col-md-2 col-form-label" style="white-space: nowrap;">How many reviews do you want to show?</label>
                                <div>
                                    <select class="form-control select required" style="width: 120%;" name="reviews_to_show" required>
                                        <?php
                                        // PHP loop to generate options dynamically
                                        $maxReviewsToShow = 50; // Maximum number of reviews you want to show

                                        // Loop to generate options
                                        for ($i = 0; $i <= $maxReviewsToShow; $i++) {
                                            $selected = ($i == $property['reviews_to_show']) ? 'selected="selected"' : '';
                                            echo '<option value="' . $i . '" ' . $selected . '>' . $i . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <br/>
                                <small>Select 0 reviews if you want to hide the 'Reviews' section in guests pages and emails</small>
                            </div>
                        </div>
                        <hr/>
                        <div class="row col-lg-12">
                            <div class="mb-3 col-lg-4">
                                <label class="col-md-2 col-form-label" style="white-space: nowrap;">Communication</label>
                                <div>
                                    <input class="form-control" type="text" name="communication" value="<?=$property['communication']; ?>">
                                </div>
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label class="col-md-2 col-form-label" style="white-space: nowrap;">Facilities</label>
                                <div>
                                    <input class="form-control" type="text" name="facilities" value="<?=$property['facilities']; ?>">
                                </div>
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label class="col-md-2 col-form-label" style="white-space: nowrap;">Cleanliness</label>
                                <div>
                                    <input class="form-control" type="text" name="cleanliness" value="<?=$property['cleanliness']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row col-lg-12">
                            <div class="mb-3 col-lg-4">
                                <label class="col-md-2 col-form-label" style="white-space: nowrap;">Comfort</label>
                                <div>
                                    <input class="form-control" type="text" name="comfort" value="<?=$property['comfort']; ?>">
                                </div>
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label class="col-md-2 col-form-label" style="white-space: nowrap;">Value For Money</label>
                                <div>
                                    <input class="form-control" type="text" name="value_for_money" value="<?=$property['value_for_money']; ?>">
                                </div>
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label class="col-md-2 col-form-label" style="white-space: nowrap;">Location</label>
                                <div>
                                    <input class="form-control" type="text" name="location" value="<?=$property['location']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <br/>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-primary d-flex justify-content-between">
                                        <span class="text-uppercase font-weight-semibold">🔗 OTHERS</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row select required">
                                            <div class="p-3 pb-0">
                                                <div class="row col-lg-12">
                                                    <div class="mb-3 col-lg-6">
                                                        <label class="col-md-2 col-form-label" style="white-space: nowrap;">Minimum nights</label>
                                                        <div class="">
                                                            <input class="form-control" type="text" name="min_nights" value="<?=$property['min_nights']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 col-lg-6">
                                                        <label class="col-md-2 col-form-label" style="white-space: nowrap;">Minimum months</label>
                                                        <div class="">
                                                            <input class="form-control" type="text" name="min_months" value="<?=$property['min_months']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr/>
                                                <div class="row">
                                                    <div class="mb-3">
                                                        <label class="" style="white-space: nowrap;">Neighborhood</label>
                                                        <div class="">
                                                            <textarea class="form-control" name="neighborhood" rows="6"><?=$property['neighborhood']; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3">
                                                        <label class="" style="white-space: nowrap;">Description</label>
                                                        <div class="">
                                                            <textarea class="form-control" name="description" rows="6"><?=$property['description']; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3">
                                                        <label class="" style="white-space: nowrap;">House rules</label>
                                                        <div class="">
                                                            <textarea class="form-control" name="house_rules" rows="4"><?=$property['house_rules']; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3">
                                                        <label class="" style="white-space: nowrap;">Safety & Property</label>
                                                        <div class="">
                                                            <textarea class="form-control" name="safety_property" rows="4"><?=$property['safety_property']; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3">
                                                        <label class="" style="white-space: nowrap;">Cancellation policy</label>
                                                        <div class="">
                                                            <textarea class="form-control" name="cancelation_policy" rows="4"><?=$property['cancelation_policy']; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3">
                                                        <label class="" style="white-space: nowrap;">Refund details</label>
                                                        <div class="">
                                                            <textarea class="form-control" name="refund_details" rows="4"><?=$property['refund_details']; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                

                                <div class="text-right mt-5">
                                    <a class="btn mr-2 btn btn-outline-secondary text-white" href="javascript:history.back()">Cancel</a>
                                    <input type="submit" name="edit_property" value="Save" class="btn btn btn-primary btn-space" data-disable-with="Save">
                                </div>
                              </div>
                            </div>
                        </div>     
                    </form>     
                    </div>        
                </div>
            </div>       
        </div>
      </div>
   </div>
  </div>
</div>

      <?=load('panel/footer');?>
		
		</div>
	</div>

	<!-- core:js -->
	<script src="../../assets/vendors/core/core.js"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="../../assets/vendors/flatpickr/flatpickr.min.js"></script>
  <script src="../../assets/vendors/apexcharts/apexcharts.min.js"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="../../assets/vendors/feather-icons/feather.min.js"></script>
	<script src="../../assets/js/template.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="../../assets/js/dashboard-dark.js"></script>

</body>
</html>