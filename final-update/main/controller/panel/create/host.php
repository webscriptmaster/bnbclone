<?php

include '../../../include/global.php';

if(!session()) redirect('../../');

if (isset($_POST['create_new_host'])) {

    $first_name         = sanitize($_POST['first_name']) ?? null;
    $last_name          = sanitize($_POST['last_name']) ?? null;
    $email              = sanitize($_POST['email']) ?? null;
    $about              = sanitize($_POST['about']) ?? null;
    $languages          = sanitize($_POST['languages']) ?? null;
    $years_since        = sanitize($_POST['years_since']) ?? null;
    $member_since_year  = sanitize($_POST['member_since_year']) ?? null;
    $member_since_month = sanitize($_POST['member_since_month']) ?? null;
    $member_since_day   = sanitize($_POST['member_since_day']) ?? null;
    $file               = sanitize($_POST['file']) ?? null;
    $is_superhost       = sanitize($_POST['is_superhost']) ?? null;
    
    $errors = array();

    if (empty($first_name)) {
        $errors[] = "First name is required.";
    }

    if (empty($last_name)) {
        $errors[] = "Last name is required.";
    }

    if (empty($about)) {
        $errors[] = "About the Host is required.";
    }

    if (empty($languages)) {
        $errors[] = "Language(s) is required.";
    }

    if (empty($years_since)) {
        $errors[] = "Years Since is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (!empty($file['name'])) {
        $allowed_types = array('image/jpeg', 'image/jpg', 'image/png');
        if (!in_array($file['type'], $allowed_types)) {
            $errors[] = "Unsupported file type. Only JPEG, JPG, PNG files are allowed.";
        }
    }

    $upload_dir = '../../assets/profile_pic_hosts/';

    $file_name = $_FILES['file']['name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $unique_file_name = uniqid() . '_' . bin2hex(random_bytes(8)) . '.' . $file_ext;

    $file_tmp_name = $_FILES['file']['tmp_name'];
    
    if (!empty($file_name)) {
        $upload_path = $upload_dir . $unique_file_name;
        if (!move_uploaded_file($file_tmp_name, $upload_path)) {
            $errors[] = "Error uploading the image.";
        }
    } 

    if (!empty($errors) || $errors == null) {

        $uid  = uniqid();
        $date = date('Y-m-d H:i:s');

        $insert = insert_data("INSERT INTO `hosts` (`id`, first_name, last_name, email, about, languages, m_year, m_month, m_day, years_ago, profile_image, is_superhost, created_at) VALUES ('$uid', '$first_name', '$last_name', '$email', '$about', '$languages', '$member_since_year', '$member_since_month', '$member_since_day', '$years_since', '$unique_file_name', '$is_superhost', '$date')");
    
        if($insert){
            $success = 'Successfully created host, ID: '.$uid . $unique_file_name;
            unset($_POST);
            unset($errors);
        }else{
            $errors[] = "Insertetion failed, please try again later.";
        }    

    } else {
        $errors = implode(', ', $errors);
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
        
        <div class="row">
            <div class="col-md-10 offset-md-1 col-sm-12">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header bg-primary d-flex justify-content-between">
                        <span class="text-uppercase font-weight-semibold">🎤 HOST DETAILS</span>
                    </div>
                    <form id="upload-form" enctype="multipart/form-data" method="post">
                        <?php
                            if (!empty($errors)) {
                                $error_message = implode(', ', $errors);
                                echo '<div class="alert alert-danger">' . $error_message . '</div>';
                            }
                        ?>
                        <div class="card-body">
                            <div class="form-group row select required ">
                            <div class="p-3 pb-0">
                            <div class="row col-lg-12">
                                <div class="mb-3 col-lg-6">
                                <label class="col-md-2 col-form-label">First Name</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="first_name" placeholder="First name">
                                </div>
                                </div>
                                <div class="mb-3 col-lg-6">
                                <label class="col-md-2 col-form-label">Last Name</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="last_name" placeholder="Last name">
                                </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label">Email</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="email" placeholder="example@domain.com">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label">About</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="about" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label">Languages</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="languages" rows="2"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-2 col-form-label">Years Since</label>
                                <div class="col-md-10">
                                <input class="form-control" type="text" name="years_since" placeholder="5">
                                </div>
                            </div>

                            <div class="row col-lg-12">
                            <label class="col-md-2 col-form-label">Member Since</label>
                                <div class="mb-3 col-lg-4">
                                <select class="form-control select required" style="width: 100%;display:block" name="member_since_year" required>
                                    <option value="2000">2000</option>
                                    <option value="2001">2001</option>
                                    <option value="2002">2002</option>
                                    <option value="2003">2003</option>
                                    <option value="2004">2004</option>
                                    <option value="2005">2005</option>
                                    <option value="2006">2006</option>
                                    <option value="2007">2007</option>
                                    <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024" selected="selected">2024</option>
                                </select>
                                </div>
                                <div class="mb-3 col-lg-3">
                                <select class="form-control select required" style="width: 100%;display:block" name="member_since_month" required>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June" selected="selected">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                                </select>
                                </div>
                                <div class="mb-3 col-lg-3">
                                <select class="form-control select required" style="width: 100%;display:block" name="member_since_day" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17" selected="selected">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                                </div>
                            </div>
                            
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
                                <label class="col-md-2 col-form-label">Profile Image</label>
                                <div class="col-md-10 col-lg-4">
                                    <div class="upload-container">
                                        <div id="drop-area" class="border-container">
                                            <div class="icons fa-4x">
                                                <i class="fas fa-file-image" data-fa-transform="shrink-3 down-2 left-6 rotate--45"></i>
                                                <i class="fas fa-file-alt" data-fa-transform="shrink-2 up-4"></i>
                                            </div>
                                            <p>Drag and drop files here, or <a href="#" id="file-browser">browse</a> your computer.</p>
                                            <input type="file" id="file-input" name="file" accept="image/jpeg, image/jpg, image/png" style="display: none;">
                                            <p id="file-name"></p>
                                        </div>
                                    </div>
                                    <div id="error-image" class="alert alert-danger" style="display:none;">
                                        <i class="fas fa-exclamation-circle" aria-hidden="true"></i> <span id="error-message"></span>
                                    </div>
                                </div> 
                            </div>

                            <script>

                            function handleFileSelect(file) {
                                if (['image/jpeg', 'image/jpg', 'image/png'].indexOf(file.type) === -1) {
                                    document.getElementById('error-message').textContent = 'Unsupported file type! Please select a JPG, JPEG or PNG image.';
                                    document.getElementById('error-image').style = 'display:block;';
                                    return;
                                }

                                document.getElementById('file-name').textContent = `File uploading: ${file.name}`;

                                setTimeout(() => {
                                    document.getElementById('file-name').textContent = `Uploaded image: ${file.name}`;
                                    document.getElementById('file-name').style = 'color: green;';
                                }, 2000);
                            }

                            document.getElementById('file-input').addEventListener('change', function(event) {
                                const file = event.target.files[0];
                                document.getElementById('error-image').style = 'display:none;';
                                handleFileSelect(file);
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

                                document.getElementById('error-image').style = 'display:none;';

                                const dt = event.dataTransfer;
                                const files = dt.files;

                                if (files.length > 0) {
                                    handleFileSelect(files[0]);
                                }
                            }

                            </script>

                            <div class="mb-3 col-lg-3"><label class="col-sm-3"></label><div class="col-sm-9"><div class="form-check">
                                <div class="uniform-checker" id="uniform-rent_host_superhost">
                                            <span class="checked">
                                                <input class="form-check-input is-valid boolean optional form-check-input-styled" type="checkbox" value="1" checked="checked" name="is_superhost">
                                            </span>
                                        </div>
                                        <label class="form-check-label boolean optional" for="rent_host_superhost">This is a 'Superhost'</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                       </div>
                        
                       </div>
                        <div class="text-right mt-5">
                        <a class="btn mr-2 btn btn-outline-secondary text-white" href="javascript:history.back()">Cancel</a>
                        <input type="submit" name="create_new_host" value="Save" class="btn btn btn-primary btn-space" data-disable-with="Save">
                        </div>
                        <div id="taxes-wrapper" style="display:none">
                        <hr>
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