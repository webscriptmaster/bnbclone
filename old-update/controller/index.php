<?php

include '../include/global.php';

if(session()) redirect('panel/');

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title><?=site('name');?> | <?=page()?></title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="assets/vendors/core/core.css">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="assets/css/demo2/style.min.css">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="assets/images/favicon.png" />

  <style>
    body{
      
    }
    :root {
    --truAnimationDurationSlow: .6s;
    --truAnimationDurationBase: .3s;
    --truAnimationDurationFast: .15s;
    --truAnimationEasingBase: ease-out;
    --truBorderRadiusNone: 0;
    --truBorderRadiusSm: 2px;
    --truBorderRadiusMd: 5px;
    --truBorderRadiusLg: 8px;
    --truBorderRadiusFull: 100%;
    --truBorderWidthNone: 0;
    --truBorderWidthSm: 1px;
    --truBorderWidthMd: 2px;
    --truBorderWidthLg: 3px;
    --truBreakpointXs: 0px;
    --truBreakpointSm: 320px;
    --truBreakpointMd: 700px;
    --truBreakpointLg: 1000px;
    --truBreakpointXl: 1300px;
    --truBreakpointDesktopThreshold: md;
    --truColorPrimaryBase: #2e1a47;
    --truColorPrimaryDark: #211333;
    --truColorPrimaryDarker: #1a0f29;
    --truColorSecondaryBase: #b0e0e2;
    --truColorSecondaryLight: #caeaec;
    --truColorSecondaryLighter: #e5f5f5;
    --truColorTertiaryBase: #afabc9;
    --truColorTertiaryDark: #9e95b7;
    --truColorTertiaryDarker: #8d7fa4;
    --truColorFeatureBase: #7c6992;
    --truColorFeatureDark: #624f79;
    --truColorFeatureDarker: #483460;
    --truColorHighlightBase: #e3dfef;
    --truColorHighlightDark: #d6d2ee;
    --truColorHighlightDarker: #c2c0e1;
    --truColorAccentBase: #207b7e;
    --truColorNeutralWhite: #ffffff;
    --truColorNeutralOffWhite: #f7f7f7;
    --truColorNeutralVeryLightGray: #dbdbdb;
    --truColorNeutralLightGray: #c9c9c9;
    --truColorNeutralMediumGray: #838383;
    --truColorNeutralDarkGray: #707070;
    --truColorNeutralVeryDarkGray: #34363b;
    --truColorNeutralBlack: #000000;
    --truElevationLower: -2;
    --truElevationLow: -1;
    --truElevationHigh: 1;
    --truElevationHigher: 2;
    --truFixedHeightSm: 36px;
    --truFixedHeightMd: 52px;
    --truFixedHeightBase: 52px;
    --truGutterWidthMobile: 24px;
    --truGutterWidthDesktop: 32px;
    --truFontWeightThin: 100;
    --truFontWeightExtraLight: 200;
    --truFontWeightLight: 300;
    --truFontWeightNormal: 400;
    --truFontWeightRegular: 400;
    --truFontWeightMedium: 500;
    --truFontWeightSemibold: 600;
    --truFontWeightBold: 700;
    --truFontWeightExtraBold: 800;
    --truFontWeightBlack: 900;
    --truIconFillColor: currentColor;
    --truIconStrokeColor: currentColor;
    --truIconStrokeWidthXs: 2px;
    --truIconStrokeWidthSm: 2px;
    --truIconStrokeWidthMd: 2px;
    --truIconStrokeWidthLg: 2px;
    --truIconStrokeWidthXl: 2px;
    --truIconSizeXs: 8px;
    --truIconSizeSm: 16px;
    --truIconSizeMd: 24px;
    --truIconSizeLg: 32px;
    --truIconSizeXl: 64px;
    --truLineHeightSm: 1;
    --truLineHeightMd: 1.25;
    --truLineHeightLg: 1.5;
    --truSpacing3xs: 2px;
    --truSpacing2xs: 4px;
    --truSpacingXs: 8px;
    --truSpacingSm: 12px;
    --truSpacingMd: 16px;
    --truSpacingLg: 24px;
    --truSpacingXl: 32px;
    --truSpacing2xl: 48px;
    --truSpacing3xl: 64px;
    --truFontSizeXs: 12px;
    --truFontSizeSm: 14px;
    --truFontSizeMd: 16px;
    --truFontSizeLg: 18px;
    --truFontSizeXl: 20px;
    --truFontSizeH1: 32px;
    --truFontSizeH2: 28px;
    --truFontSizeH3: 24px;
    --truFontSizeH4: 20px;
    --truFontSizeH5: 18px;
    --truFontSizeH6: 16px;
    --truColorBackgroundPrimary: #ffffff;
    --truColorBackgroundSecondary: #f7f7f7;
    --truColorBackgroundTertiary: #2e1a47;
    --truColorBackgroundQuaternary: #d6d2ee;
    --truColorBackgroundQuinary: #e5f5f5;
    --truColorBackgroundOverlay: rgba(0, 0, 0, .5);
    --truColorBorderPrimary: #dbdbdb;
    --truColorBorderFocus: #707070;
    --truColorTextHeading: #2e1a47;
    --truColorTextPrimary: #34363b;
    --truColorTextSecondary: #707070;
    --truColorStatusSuccessBase: #33cc69;
    --truColorStatusSuccessContrast: #14803b;
    --truColorStatusErrorBase: #ff4f33;
    --truColorStatusErrorContrast: #d61d00;
    --truColorStatusWarningBase: #ffa329;
    --truColorStatusWarningContrast: #a86019;
    --truColorStatusInfoBase: #45b0e6;
    --truColorStatusInfoContrast: #0077b3;
    --truColorStatusPromoBase: #b0e0e2;
    --truColorStatusPromoContrast: #207b7e;
    --truColorInteractiveBase: #7c6992;
    --truColorInteractiveHover: #624f79;
    --truColorInteractivePressed: #483460;
    --truColorInteractiveSelected: #2e1a47;
    --truColorInteractiveDisabled: #c9c9c9;
  }
  </style>
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page" style="background-color: #000;">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page" >
					<div class="col-md-8 col-xl-4 mx-auto" >
						<div class="card">
							<div class="row" style="border: 1px solid grey;border-radius: 10px;background-color: #fff;">
                <div class="col-md-2 pe-md-0">
                  <div class="">
                  </div>
                </div>
                <div class="col-md-8 ps-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <h3 class="fw-normal mb-4 mt-2" style="color: #000">Welcome back! Log in to your account.</h3>
                    <form class="forms-sample">
                      <div class="mb-3">
                        <label for="userusername" class="form-label" style="color: #000">Username</label>
                        <input type="username" class="form-control" id="username" name="username" placeholder="username">
                        <span role="alert"></span>
                      </div>
                      <div class="mb-3">
                        <label for="userPassword" class="form-label" style="color: #000">Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" placeholder="Password">
                        <span role="alert"></span>
                      </div>
                      <?=recaptcha('load');?>
                      <hr/>
                      <div>
                        <input type="hidden" name="csrf_token" value="<?=csrf()?>">
                        <input type="hidden" name="csrf_name" value="constant_form_validator">
                        <button type="button" id="login" name="login" class="btn btn-primary me-2 mb-2 mb-md-0 text-white w-100" style="
                        font-family: var(--truFontFamilyPrimary, var(--truFontFamilyBold));
                        font-weight: var(--truFontWeightBold);
                        font-size: var(--truFontSizeMd);
                        border-radius: var(--truBorderRadiusMd);
                        display: inline-flex;
                        cursor: pointer;
                        align-items: center;
                        justify-content: center;
                        text-align: center;
                        white-space: nowrap;
                        text-decoration: none;
                        padding: 0 var(--truSpacingXl);
                        height: var(--truFixedHeightBase);
                        width: 100%;
                        position: relative;
                        transition-property: background-color,border-color,color,box-shadow;
                        transition-duration: var(--truAnimationDurationBase);
                        transition-timing-function: var(--truAnimationEasingBase);
                        background-color: #000;
                        color: #fff;
                        ">Login</button>
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
	</div>

	<!-- core:js -->
	<script src="assets/vendors/core/core.js"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="assets/vendors/feather-icons/feather.min.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="assets/js/functions.js"></script>

  <script>
        $(document).ready(function() {
            $('input[name="username"], input[name="password"]').on('keydown', function(event) {
              if (event.keyCode === 13) {
                event.preventDefault();
                $('.btn-primary').click();
              }
            });

          $('#login').click(function(event) {

            event.preventDefault(); // Prevent form submission

            var button = $(this);

            // Clear previous errors
            $('.field.text').removeClass('error');
            $('.label-error').remove();

            var username = $('input[name="username"]').val().trim();
            var password = $('input[name="password"]').val().trim();
            
            // Validate username
            if (username === '') {
              message('error', 'Please enter an username.');
              grecaptcha.reset();
              return;
            }

            // Validate password
            if (password === '') {
              message('error', 'Please enter a password.');
              grecaptcha.reset();
              return;
            } else if(password.length < 8) {
              message('error', 'Password must be at least 8 characters long.');
              grecaptcha.reset();
              return;
            }

            button.html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading...");
              $.ajax({
                url: '../api/auth',
                method: 'POST',
                dataType: 'json',
                data: {
                  username: username,
                  password: password,
                  csrf_token: $('input[name="csrf_token"]').val(),
                  csrf_name: $('input[name="csrf_name"]').val(),
                  'page': 'auth_login'
                },
                success: function(response) {
                  // Handle successful response and redirect
                  var response = JSON.parse(JSON.stringify(response));
                  if(response.status == 'success') {
                    window.location.href = 'panel/';
                  }
                },
                error: function(response) {
                  var error = response.responseJSON;
                  message('error', error.message);
                  button.html('Login');
                  $('input[name="password"]').val('');
                  grecaptcha.reset();
                },
              });
          });
        });
      </script>


</body>
</html>