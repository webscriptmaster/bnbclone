<?php

include '../../../include/global.php';

if(!session()) redirect('../../');

if (isset($_POST['create_offer'])) {
    $select_host = sanitize($_POST['select_host']) ?? null;
    $select_property = sanitize($_POST['select_property']) ?? null;
    $select_trip_type = sanitize($_POST['select_trip_type']) ?? null;
    $nightly_rate = sanitize($_POST['nightly_rate']) ?? null;
    $secure_deposite_amount = sanitize($_POST['secure_deposite_amount']) ?? null;
    $secure_deposite_amount_M = sanitize($_POST['secure_deposite_amount_M']) ?? null;
    $monthly_rate = sanitize($_POST['monthly_rate']) ?? null;
    $guest_email = sanitize($_POST['guest_email']) ?? null;
    $guest_username = sanitize($_POST['guest_username']) ?? null;
    $payment_method = sanitize($_POST['payment_method']) ?? null;

    $errors = [];

    if (empty($select_host)) {
        $errors[] = "Host selection is required.";
    }

    if (empty($select_property)) {
        $errors[] = "Property selection is required.";
    }

    if (empty($select_trip_type)) {
        $errors[] = "Trip type selection is required.";
    }

    if (empty($guest_email)) {
        $errors[] = "Guest email is required.";
    } elseif (!filter_var($guest_email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid guest email format.";
    }

    if (empty($guest_username)) {
        $errors[] = "Guest username is required.";
    }

    if (empty($payment_method)) {
        $errors[] = "Payment method is required.";
    }

    if (empty($errors)) {

        $uid  = uniqid();
        $date = date('Y-m-d H:i:s');
        $insert = insert_data("INSERT INTO `offers` (`id`, `host_id`, `property_id`, `trip_type`, `nightly_rate`,`secure_deposite`, `monthly_rate`,`secure_deposite_M`, `guest_email`, `guest_username`, `payment_method`, `created_at`) VALUES ('$uid', '$select_host', '$select_property', '$select_trip_type', '$nightly_rate','$secure_deposite_amount', '$monthly_rate','$secure_deposite_amount_M', '$guest_email', '$guest_username', '$payment_method', '$date')");

        if ($insert) {
            $success = 'Offer successfully created, ID: '.$uid;
            $_POST = array();
        } else {
            $errors[] = "Insertion failed, please try again later.";
        }
    } else {
        $errors_string = implode(', ', $errors);
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
            <h4 class="mb-3 mb-md-0 text-white"><?=site('name')?> Panel</h4>
          </div>
        </div>

        <?=$error ? '<div class="alert alert-danger">'.$error.'</div>' : ''?>
        <?=$success ? '<div class="alert alert-success">'.$success.'</div>' : ''?>
        
            <div class="row">
                <div class="col-md-10 offset-md-1 col-sm-12">
                    <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                        <div class="card-header bg-primary d-flex justify-content-between">
                            <span class="text-uppercase font-weight-semibold">📌 Host &amp; property details</span>
                        </div>
                        <form method="post">
                        <div class="card-body">
                                <div class="form-group row select required ">
                                <div class="p-3 pb-0">
                                <div class="row col-lg-12">
                                    <label class="col-md-2 col-form-label">Host</label>
                                    <div class="">
                                        <select class="form-control select required" style="width: 100%;" name="select_host" required>
                                            <option>Select Host...</option>
                                            <?php

                                            $fetch = fetch("SELECT * FROM hosts ORDER BY created_at DESC");

                                            foreach($fetch as $host){?>

                                            <option value="<?=$host['id']?>"><?=$host['first_name']?> <?=$host['last_name']?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row col-lg-12">
                                    <label class="col-md-2 col-form-label">Property</label>
                                    <div class="">
                                    <select class="form-control select required" style="width: 100%;" name="select_property" id="select_property" required>
                                        <option>Select Property...</option>
                                        <?php
                                            $fetch = fetch("SELECT * FROM property ORDER BY created_at DESC");
                                            foreach ($fetch as $property) {
                                            ?>
                                            <option value="<?= $property['id'] ?>" data-nightly="<?= $property['nightly_fee'] ?>" data-monthly="<?= $property['monthly_fee'] ?>">
                                                <?= $property['property_name'] ?> [ Type: <?= $property['property_type'] ?> | Location: <?= $property['city'] ?>, <?= $property['state'] ?> ]
                                            </option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row col-lg-12">
                                    <label class="col-md-2 col-form-label">Trip Type</label>
                                    <div class="">
                                        <select class="form-control select required" style="width: 100%;" name="select_trip_type" id="rent_offer_trip_type" required>
                                            <option>Select Trip...</option>
                                            <option value="short">Short-term rental</option>
                                            <option value="long">Long-term rental</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="nightly-rate" class="trip-type" style="display:none">
                                        <div class="form-group string optional rent_offer_nightly_rate form-group-valid">
                                            <label class="form-control-label string optional" for="rent_offer_nightly_rate">Nightly rate</label>
                                            <div class="form-group form-group-feedback form-group-feedback-right">
                                                <input class=" is-valid string required form-control numeric" type="text" value="0" name="nightly_rate" id="rent_offer_nightly_rate">
                                                <div class="form-control-feedback property-currency"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="monthly-rate" class="trip-type" style="display:none">
                                        <div class="form-group string optional rent_offer_monthly_rate form-group-valid">
                                        <label class="form-control-label string optional" for="rent_offer_monthly_rate">Monthly rate</label>
                                        <div class="form-group form-group-feedback form-group-feedback-right">
                                            <input class=" is-valid string required form-control numeric" type="text" value="0" name="monthly_rate" id="rent_offer_monthly_rate">
                                            <div class="form-control-feedback property-currency"></div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="nightly-rate" class="trip-type" style="display:none">
                                        <div class="form-group string optional rent_offer_nightly_rate form-group-valid">
                                            <label class="form-control-label string optional" for="secure_deposite_input">Security Deposit</label>
                                            <div class="form-group form-group-feedback form-group-feedback-right">
                                                <input class=" is-valid string required form-control numeric" type="text" value="0" name="secure_deposite_amount" id="secure_deposite_input">
                                                <div class="form-control-feedback property-currency"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="monthly-rate" class="trip-type" style="display:none">
                                        <div class="form-group string optional rent_offer_monthly_rate form-group-valid">
                                        <label class="form-control-label string optional" for="secure_deposite_input_M">Security Deposit</label>
                                        <div class="form-group form-group-feedback form-group-feedback-right">
                                            <input class=" is-valid string required form-control numeric" type="text" value="0" name="secure_deposite_amount_M" id="secure_deposite_input_M">
                                            <div class="form-control-feedback property-currency"></div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>

                        <hr/>

                    </div>
                    <div class="col-md-4">
                        <div class="card bg-dark" id="tech-details">
                        <div class="card-header bg-dark d-flex justify-content-between">
                            <span class="text-uppercase font-weight-semibold">Technical details</span>
                        </div>
                        <div class="card-body bg-dark">
                            <label class="col-md-2 col-form-label">Payment</label>
                            <div class="">
                                <select class="form-control select required" style="width: 100%;" name="payment_method" required>
                                    <option>Select Payment Method...</option>
                                    <option value="credit_card">Credit Card</option>
                                    <option value="bank">Bank Transfer</option>
                                </select>
                            </div>
                            <label class="col-form-label">Guest Email</label>
                            <div class="form-group form-group-feedback form-group-feedback-right">
                                <input class="  string required form-control " required="required" type="email" name="guest_email">
                                <div class="form-control-feedback property-currency"></div>
                            </div>
                            <label class="col-form-label">Guest Username</label>
                            <div class="form-group form-group-feedback form-group-feedback-right">
                                <input class="  string required form-control " required="required" type="text" name="guest_username">
                            <div class="form-control-feedback property-currency"></div>
                            </div>
                        </div>
                        <div class="card">
                        <div class="card-body">
                            <div class="text-right">
                            <a class="btn mr-2 btn btn-outline-light btn-space" href="javascript:history.back()">Cancel</a>
                            <button type="submit" name="create_offer" class="btn btn-success btn-space">Create Offer</button>
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

  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script type="text/javascript">

    $(document).ready(function() {
        $("#rent_offer_trip_type").change(function() {
            var selectedPropertyId = $("#select_property").val();
            var selectedOption = $("#select_property option:selected");
            var monthlyFee = selectedOption.data('monthly'); 
            var nightlyFee = selectedOption.data('nightly'); 

            if ($(this).val() == "short") {
            $(".nightly-rate").show();
            $(".monthly-rate").hide();
            $("#rent_offer_nightly_rate").val(nightlyFee);
            $("#rent_offer_monthly_rate").val('');
            } else if ($(this).val() == "long") {
            $(".monthly-rate").show();
            $(".nightly-rate").hide();
            $("#rent_offer_monthly_rate").val(monthlyFee);
            $("#rent_offer_nightly_rate").val('');
            } else {
            $(".monthly-rate").hide();
            $(".nightly-rate").hide();
            $("#rent_offer_nightly_rate").val('');
            $("#rent_offer_monthly_rate").val('');
            }
        });
    });

    </script>

</body>
</html>