<?php

include '../../../include/global.php';

if(!session()) redirect('../../');

if (isset($_POST['create_new_property'])) {

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


    if (!empty($errors) || $errors == null) {

        $uid  = uniqid();
        $date = date('Y-m-d H:i:s');
    
        $insert = "INSERT INTO `property` 
        (`id`, `property_name`, `property_type`, `address`, `city`, `state`, `zip`, `guests_included`, `bedrooms`, `beds`, `bathrooms`, `space`, 
        `nightly_fee`, `monthly_fee`, `cleaning_fee`, `service_fee_type`, `service_fee_total`, `tourist_fee_type`, `tourist_fee_total`, 
        `reviews_to_show`, `communication`, `facilities`, `cleanliness`, `comfort`, `value_for_money`, `location`, 
        `min_nights`, `min_months`, `neighborhood`, `description`, `house_rules`, `safety_property`, `cancelation_policy`, `refund_details`, `created_at`) 
        VALUES 
        ('$uid', '$title', '$type', '$address', '$city', '$state', '$zip', '$guests', '$bedrooms', '$beds', '$bathrooms', '$space', 
        '$nightly_fee', '$monthly_fee', '$cleaning_fee', '$service_fee_type', '$service_fee_total', '$tourist_fee_type', '$tourist_fee_total', 
        '$reviews_to_show', '$communication', '$facilities', '$cleanliness', '$comfort', '$value_for_money', '$location', 
        '$min_nights', '$min_months', '$neighborhood', '$description', '$house_rules', '$safety_property', '$cancelation_policy', '$refund_details', '$date')";

        $insert = insert_data($insert);

        if($insert){
            $success = 'Successfully created Property, ID: '.$uid;
            unset($_POST);
            unset($errors);
            header("Location: ../index.php"); 
            exit(); 
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
                            <div class="form-group row select required ">
                            <div class="p-3 pb-0">
                            <div class="row col-lg-12">
                                <div class="mb-3 col-lg-4">
                                <label class="col-md-2 col-form-label">Type</label>
                                <div class="">
                                    <select class="form-control select required" style="width: 100%;" name="type" required>
                                        <option value="">Select Type...</option>
                                        <option value="Apartment">Apartment</option>
                                        <option value="Condominium">Condominium</option>
                                        <option value="Guesthouse">Guesthouse</option>
                                        <option value="House">House</option>
                                        <option value="Guest suite">Guest suite</option>
                                        <option value="Townhouse">Townhouse</option>
                                        <option value="Vacation home">Vacation home</option>
                                        <option value="Boat">Boat</option>
                                        <option value="Bungalow">Bungalow</option>
                                        <option value="Cabin">Cabin</option>
                                        <option value="Castle">Castle</option>
                                        <option value="Cave">Cave</option>
                                        <option value="Chalet">Chalet</option>
                                        <option value="Dorm">Dorm</option>
                                        <option value="Earth House">Earth House</option>
                                        <option value="Hut">Hut</option>
                                        <option value="Igloo">Igloo</option>
                                        <option value="Island">Island</option>
                                        <option value="Lighthouse">Lighthouse</option>
                                        <option value="Loft">Loft</option>
                                        <option value="Plane">Plane</option>
                                        <option value="Camper/RV">Camper/RV</option>
                                        <option value="Tent">Tent</option>
                                        <option value="Tipi">Tipi</option>
                                        <option value="Train">Train</option>
                                        <option value="Treehouse">Treehouse</option>
                                        <option value="Villa">Villa</option>
                                        <option value="Yurt">Yurt</option>
                                    </select>
                                </div>
                                </div>
                                <div class="mb-3 col-lg-8">
                                <label class="col-md-2 col-form-label">Title</label>
                                <div class="">
                                    <input class="form-control" type="text" name="title" placeholder="Enter your property main title...">
                                </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="mb-3">
                                <label class="col-md-2 col-form-label">Street Address</label>
                                <div class="">
                                    <input class="form-control" type="text" name="address" placeholder="Main, Str 902">
                                </div>
                            </div>
                            <hr/>
                            <div class="row col-lg-12">
                                <div class="mb-3 col-lg-4">
                                    <label class="col-md-2 col-form-label">City</label>
                                    <div class="">
                                        <input class="form-control" type="text" name="city" placeholder="Sri Lanka">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <label class="col-md-2 col-form-label">State</label>
                                    <div class="">
                                        <input class="form-control" type="text" name="state" placeholder="Colombo">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <label class="col-md-2 col-form-label">Zip</label>
                                    <div class="">
                                        <input class="form-control" type="text" name="zip" placeholder="ZE 25">
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row col-lg-12">
                                <div class="mb-3 col-lg-2">
                                    <label class="col-md-2 col-form-label" style="white-space: nowrap;">Guests</label>
                                    <div class="">
                                         <select class="form-control select required" style="width: 100%;" name="guests" required>
                                            <option value="1">1</option>
                                            <option selected="selected" value="2">2</option>
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
                                            <option value="17">17</option>
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
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>
                                            <option value="36">36</option>
                                            <option value="37">37</option>
                                            <option value="38">38</option>
                                            <option value="39">39</option>
                                            <option value="40">40</option>
                                            <option value="41">41</option>
                                            <option value="42">42</option>
                                            <option value="43">43</option>
                                            <option value="44">44</option>
                                            <option value="45">45</option>
                                            <option value="46">46</option>
                                            <option value="47">47</option>
                                            <option value="48">48</option>
                                            <option value="49">49</option>
                                            <option value="50">50</option>
                                            <option value="51">51</option>
                                            <option value="52">52</option>
                                            <option value="53">53</option>
                                            <option value="54">54</option>
                                            <option value="55">55</option>
                                            <option value="56">56</option>
                                            <option value="57">57</option>
                                            <option value="58">58</option>
                                            <option value="59">59</option>
                                            <option value="60">60</option>
                                            <option value="61">61</option>
                                            <option value="62">62</option>
                                            <option value="63">63</option>
                                            <option value="64">64</option>
                                            <option value="65">65</option>
                                            <option value="66">66</option>
                                            <option value="67">67</option>
                                            <option value="68">68</option>
                                            <option value="69">69</option>
                                            <option value="70">70</option>
                                            <option value="71">71</option>
                                            <option value="72">72</option>
                                            <option value="73">73</option>
                                            <option value="74">74</option>
                                            <option value="75">75</option>
                                            <option value="76">76</option>
                                            <option value="77">77</option>
                                            <option value="78">78</option>
                                            <option value="79">79</option>
                                            <option value="80">80</option>
                                            <option value="81">81</option>
                                            <option value="82">82</option>
                                            <option value="83">83</option>
                                            <option value="84">84</option>
                                            <option value="85">85</option>
                                            <option value="86">86</option>
                                            <option value="87">87</option>
                                            <option value="88">88</option>
                                            <option value="89">89</option>
                                            <option value="90">90</option>
                                            <option value="91">91</option>
                                            <option value="92">92</option>
                                            <option value="93">93</option>
                                            <option value="94">94</option>
                                            <option value="95">95</option>
                                            <option value="96">96</option>
                                            <option value="97">97</option>
                                            <option value="98">98</option>
                                            <option value="99">99</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-md-2 col-form-label" style="white-space: nowrap;">Bedrooms</label>
                                    <div class="">
                                        <select class="form-control select required" style="width: 100%;" name="bedrooms" required>
                                            <option selected="selected" value="1">1</option>
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
                                            <option value="17">17</option>
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
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>
                                            <option value="36">36</option>
                                            <option value="37">37</option>
                                            <option value="38">38</option>
                                            <option value="39">39</option>
                                            <option value="40">40</option>
                                            <option value="41">41</option>
                                            <option value="42">42</option>
                                            <option value="43">43</option>
                                            <option value="44">44</option>
                                            <option value="45">45</option>
                                            <option value="46">46</option>
                                            <option value="47">47</option>
                                            <option value="48">48</option>
                                            <option value="49">49</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label class="col-md-2 col-form-label" style="white-space: nowrap;">Beds</label>
                                    <div class="">
                                        <select class="form-control select required" style="width: 100%;" name="beds" required>
                                            <option value="0">0</option>
                                            <option selected="selected" value="1">1</option>
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
                                            <option value="17">17</option>
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
                                            <option value="32">32</option>
                                            <option value="33">33</option>
                                            <option value="34">34</option>
                                            <option value="35">35</option>
                                            <option value="36">36</option>
                                            <option value="37">37</option>
                                            <option value="38">38</option>
                                            <option value="39">39</option>
                                            <option value="40">40</option>
                                            <option value="41">41</option>
                                            <option value="42">42</option>
                                            <option value="43">43</option>
                                            <option value="44">44</option>
                                            <option value="45">45</option>
                                            <option value="46">46</option>
                                            <option value="47">47</option>
                                            <option value="48">48</option>
                                            <option value="49">49</option>
                                            <option value="50">50</option>
                                            <option value="51">51</option>
                                            <option value="52">52</option>
                                            <option value="53">53</option>
                                            <option value="54">54</option>
                                            <option value="55">55</option>
                                            <option value="56">56</option>
                                            <option value="57">57</option>
                                            <option value="58">58</option>
                                            <option value="59">59</option>
                                            <option value="60">60</option>
                                            <option value="61">61</option>
                                            <option value="62">62</option>
                                            <option value="63">63</option>
                                            <option value="64">64</option>
                                            <option value="65">65</option>
                                            <option value="66">66</option>
                                            <option value="67">67</option>
                                            <option value="68">68</option>
                                            <option value="69">69</option>
                                            <option value="70">70</option>
                                            <option value="71">71</option>
                                            <option value="72">72</option>
                                            <option value="73">73</option>
                                            <option value="74">74</option>
                                            <option value="75">75</option>
                                            <option value="76">76</option>
                                            <option value="77">77</option>
                                            <option value="78">78</option>
                                            <option value="79">79</option>
                                            <option value="80">80</option>
                                            <option value="81">81</option>
                                            <option value="82">82</option>
                                            <option value="83">83</option>
                                            <option value="84">84</option>
                                            <option value="85">85</option>
                                            <option value="86">86</option>
                                            <option value="87">87</option>
                                            <option value="88">88</option>
                                            <option value="89">89</option>
                                            <option value="90">90</option>
                                            <option value="91">91</option>
                                            <option value="92">92</option>
                                            <option value="93">93</option>
                                            <option value="94">94</option>
                                            <option value="95">95</option>
                                            <option value="96">96</option>
                                            <option value="97">97</option>
                                            <option value="98">98</option>
                                            <option value="99">99</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="col-md-2 col-form-label" style="white-space: nowrap;">Bathrooms</label>
                                    <div class="">
                                        <select class="form-control select required" style="width: 100%;" name="bathrooms" required>
                                            <option value="0">0</option>
                                            <option selected="selected" value="1">1</option>
                                            <option value="1.5">1.5</option>
                                            <option value="2">2</option>
                                            <option value="2.5">2.5</option>
                                            <option value="3">3</option>
                                            <option value="3.5">3.5</option>
                                            <option value="4">4</option>
                                            <option value="4.5">4.5</option>
                                            <option value="5">5</option>
                                            <option value="5.5">5.5</option>
                                            <option value="6">6</option>
                                            <option value="6.5">6.5</option>
                                            <option value="7">7</option>
                                            <option value="7.5">7.5</option>
                                            <option value="8">8</option>
                                            <option value="8.5">8.5</option>
                                            <option value="9">9</option>
                                            <option value="9.5">9.5</option>
                                            <option value="10">10</option>
                                            <option value="10.5">10.5</option>
                                            <option value="11">11</option>
                                            <option value="11.5">11.5</option>
                                            <option value="12">12</option>
                                            <option value="12.5">12.5</option>
                                            <option value="13">13</option>
                                            <option value="13.5">13.5</option>
                                            <option value="14">14</option>
                                            <option value="14.5">14.5</option>
                                            <option value="15">15</option>
                                            <option value="15.5">15.5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label class="col-md-2 col-form-label" style="white-space: nowrap;">Space</label>
                                    <div class="">
                                        <input class="form-control" type="text" name="space">
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
                        <div class="form-group row select required ">
                        <div class="p-3 pb-0">
                            <div class="row col-lg-12">
                                <div class="mb-3 col-lg-4">
                                    <label class="col-md-2 col-form-label" style="white-space: nowrap;">Nightly Rate</label>
                                    <div class="">
                                        <input class="form-control" type="number" name="nightly_fee" value="0">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <label class="col-md-2 col-form-label" style="white-space: nowrap;">Monthly Rate</label>
                                    <div class="">
                                        <input class="form-control" type="number" name="monthly_fee" value="0">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <label class="col-md-2 col-form-label" style="white-space: nowrap;">Cleaning Fee</label>
                                    <div class="">
                                        <input class="form-control" type="number" name="cleaning_fee" value="0">
                                    </div>
                                </div>
                            </div>
                        <hr/>
                        <div class="row col-lg-12">
                         <div class="mb-3 col-lg-8">
                                <label class="col-md-2 col-form-label">Service Fee Kind</label>
                                <select class="form-control select required" style="width: 100%;" name="service_fee_type" required>
                                    <option value="">Select if service fee is percentage based or fixed value...</option>
                                    <option value="percentage">Percentage calculated from total without deposit and cleaning fee</option>
                                    <option value="fixed">Fixed service fee value</option>
                                </select>
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label class="col-md-2 col-form-label" style="white-space: nowrap;">Service Fee</label>
                                <div class="">
                                    <input class="form-control" type="number" name="service_fee_total" value="0">
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row col-lg-12">
                         <div class="mb-3 col-lg-8">
                                <label class="col-md-2 col-form-label" style="white-space: nowrap;">Tourist/Lodging fee kind</label>
                                <select class="form-control select required" style="width: 100%;" name="tourist_fee_type" required>
                                    <option value="">Select if tourist/lodging fee is percentage based or fixed value...</option>
                                    <option value="percentage">Percentage calculated from total without deposit and cleaning fee</option>
                                    <option value="fixed">Fixed tourist/lodging fee value</option>
                                </select>
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label class="col-md-2 col-form-label" style="white-space: nowrap;">Service Fee</label>
                                <div class="">
                                    <input class="form-control" type="number" name="tourist_fee_total" value="0">
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
                            <div class="form-group row select required ">
                            <div class="p-3 pb-0">
                            <div class="mb-3 col-md-10">
                                <label class="col-md-2 col-form-label" style="white-space: nowrap;">How many reviews do you want to show?</label>
                                <div class="">
                                    <select class="form-control select required" style="width: 120%;" name="reviews_to_show" required>
                                        <option value="0">0</option>
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
                                        <option value="17">17</option>
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
                                        <option value="32">32</option>
                                        <option value="33">33</option>
                                        <option value="34">34</option>
                                        <option value="35">35</option>
                                        <option value="36">36</option>
                                        <option value="37">37</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="46">46</option>
                                        <option value="47">47</option>
                                        <option value="48">48</option>
                                        <option value="49">49</option>
                                        <option selected="selected" value="50">50</option>
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
                                    <div class="">
                                        <input class="form-control" type="number" name="communication" value="10">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <label class="col-md-2 col-form-label" style="white-space: nowrap;">Facilities</label>
                                    <div class="">
                                        <input class="form-control" type="number" name="facilities" value="10">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <label class="col-md-2 col-form-label" style="white-space: nowrap;">Cleanliness</label>
                                    <div class="">
                                        <input class="form-control" type="number" name="cleanliness" value="10">
                                    </div>
                                </div>
                            </div>
                            <div class="row col-lg-12">
                                <div class="mb-3 col-lg-4">
                                    <label class="col-md-2 col-form-label" style="white-space: nowrap;">Comfort</label>
                                    <div class="">
                                        <input class="form-control" type="number" name="comfort" value="10">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <label class="col-md-2 col-form-label" style="white-space: nowrap;">Value For Money</label>
                                    <div class="">
                                        <input class="form-control" type="number" name="value_for_money" value="10">
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <label class="col-md-2 col-form-label" style="white-space: nowrap;">Location</label>
                                    <div class="">
                                        <input class="form-control" type="number" name="location" value="10">
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
                                        <div class="form-group row select required ">
                                        <div class="p-3 pb-0">
                                        <div class="row col-lg-12">
                                            <div class="mb-3 col-lg-6">
                                                <label class="col-md-2 col-form-label" style="white-space: nowrap;">Minimum nights</label>
                                                <div class="">
                                                    <input class="form-control" type="number" name="min_nights" value="3">
                                                </div>
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label class="col-md-2 col-form-label" style="white-space: nowrap;">Minimum months</label>
                                                <div class="">
                                                    <input class="form-control" type="number" name="min_months" value="2">
                                                </div>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="row">
                                        <div class="mb-3">
                                            <label class="" style="white-space: nowrap;">Neighborhood</label>
                                                <div class="">
                                                    <textarea class="form-control" type="text" name="neighborhood" rows="6"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div class="mb-3">
                                            <label class="" style="white-space: nowrap;">Description</label>
                                                <div class="">
                                                    <textarea class="form-control" type="text" name="description" rows="6"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div class="mb-3">
                                            <label class="" style="white-space: nowrap;">House rules</label>
                                                <div class="">
                                                    <textarea class="form-control" type="text" name="house_rules" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div class="mb-3">
                                            <label class="" style="white-space: nowrap;">Safety & Property</label>
                                                <div class="">
                                                    <textarea class="form-control" type="text" name="safety_property" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div class="mb-3">
                                            <label class="" style="white-space: nowrap;">Cancelation policy</label>
                                                <div class="">
                                                    <textarea class="form-control" type="text" name="cancelation_policy" rows="4">Cancel before 3:00 PM and get a full refund, minus the service fee.</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div class="mb-3">
                                            <label class="" style="white-space: nowrap;">Refund details</label>
                                                <div class="">
                                                    <textarea class="form-control" type="text" name="refund_details" rows="4">If you experience a travel issue that prevents you from being able to complete a trip, and you’re unable to resolve with your host, our Guest Refund Policy may be applied. Deposit is 100% refundable.</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div> 

                                <div class="text-right mt-5">
                                    <a class="btn mr-2 btn btn-outline-secondary text-white" href="javascript:history.back()">Cancel</a>
                                    <input type="submit" name="create_new_property" value="Save" class="btn btn btn-primary btn-space" data-disable-with="Save">
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