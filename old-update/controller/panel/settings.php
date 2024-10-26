<?php

include '../../include/global.php';

if(!session()) redirect('../');

if (isset($_POST['update_site_settings'])) {
  $siteName = $_POST['site_name'];
  $siteUrl = $_POST['site_url'];
  $recaptchaSite = $_POST['recaptcha_site'];
  $recaptchaSecret = $_POST['recaptcha_secret'];
  $adminPassword = $_POST['admin_password'];

  if (empty($siteName) || empty($siteUrl)) {
      $error = 'Please fill all required fields.';
  } else {
      // Update site settings
      $update = update_data("UPDATE settings SET name = '$siteName', site_url = '$siteUrl', recaptcha_site = '$recaptchaSite', recaptcha_secret = '$recaptchaSecret'");
      
      // Update admin password if provided
      if (!empty($adminPassword)) {
          if (strlen($adminPassword) < 8) {
              $error = 'Admin password must be at least 8 characters long.';
          } else {
              $encryptedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);
              $userId = $_SESSION['admin_id'];
              update_data("UPDATE admin SET password = '$encryptedPassword' WHERE id = '$userId'");
          }
      }

      if ($update) {
          $success = 'Settings updated successfully.';
      } else {
          $error = 'Something went wrong, please try again.';
      }
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
	<link rel="stylesheet" href="../assets/vendors/core/core.css">
	<!-- endinject -->

	<!-- Plugin css for this page -->
  <link rel="stylesheet" href="../assets/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../assets/vendors/easymde/easymde.min.css">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="../assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="../assets/css/demo2/style.min.css">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="../assets/images/favicon.png" />
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
            <h4 class="mb-3 mb-md-0"><?=site('name')?> Panel</h4>
          </div>
        </div>

        <?=$error ? '<div class="alert alert-danger">'.$error.'</div>' : ''?>
        <?=$success ? '<div class="alert alert-success">'.$success.'</div>' : ''?>
        
        <div class="row inbox-wrapper">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-8 center is-center justify-content-center" style="margin:auto;">
                    <div>
                      <div class="d-flex align-items-center p-3 border-bottom tx-16">
                        <i class="fas fa-globe text-info"></i> <span style="margin-left:1%;"><?=site('name')?> Panel</span>
                      </div>
                    </div>
                    <form method="POST">
                      <div class="p-3 pb-0">
                        <div class="row mb-3">
                          <label class="col-md-2 col-form-label">Site Name</label>
                          <div class="col-md-10">
                            <input class="form-control" type="text" name="site_name" value="<?=site('name')?>">
                          </div>
                        </div>
                      </div>
                      <div class="p-3 pb-0">
                        <div class="row mb-3">
                          <label class="col-md-2 col-form-label">Site URL <span class="text-danger">(* REQUIRED)</danger></label>
                          <div class="col-md-10">
                            <input class="form-control" type="text" name="site_url" value="<?=site('site_url')?>">
                          </div>
                        </div>
                      </div>
                      <hr/>
                      <p class="text-center">Security Settings</p>
                      <div class="p-3 pb-0">
                        <div class="row mb-3">
                          <label class="col-md-2 col-form-label">Recaptcha Site Key</label>
                          <div class="col-md-10">
                            <input class="form-control" type="text" name="recaptcha_site" value="<?=site('recaptcha_site')?>">
                          </div>
                        </div>
                      </div>
                      <div class="p-3 pb-0">
                        <div class="row mb-3">
                          <label class="col-md-2 col-form-label">Recaptcha Secret Key</label>
                          <div class="col-md-10">
                            <input class="form-control" type="text" name="recaptcha_secret" value="<?=site('recaptcha_secret')?>">
                          </div>
                        </div>
                      </div>
                      <div class="p-3 pb-0">
                        <div class="row mb-3">
                          <label class="col-md-2 col-form-label">Admin Password</label>
                          <div class="col-md-10">
                            <input class="form-control" type="text" name="admin_password" placeholder="Leave blank to keep the same">
                          </div>
                        </div>
                      </div>
                      <hr/>
                      <div>
                        <button type="submit" name="update_site_settings" class="btn btn-primary me-2 mb-2 mb-md-0 text-white" style="width:20%;">Update <?=site('name')?></button>
                      </div>
                    </div>
                  </form>
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
	<script src="../assets/vendors/core/core.js"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="../assets/vendors/flatpickr/flatpickr.min.js"></script>
  <script src="../assets/vendors/apexcharts/apexcharts.min.js"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="../assets/vendors/feather-icons/feather.min.js"></script>
	<script src="../assets/js/template.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="../assets/js/dashboard-dark.js"></script>
  <script src="https://code.jdelete_data.com/jdelete_data-3.6.0.min.js"></script>
	<!-- End custom js for this page -->

  <script>

    updateVictims();


    function updateVictims() {
      $.ajax({
        url: '../../api/victims',
        method: 'GET',
        data: {
          page: 'victims',
          type: '<?=$_GET['type']?>'
        },
        success: function(response) {
              $('#victimTableBody').html(response);
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    }

    // Periodically update victims every 5 seconds. (Modify this if you want to change the interval)
    setInterval(updateVictims, 5000);
  </script>

</body>
</html>