<?php
if (!empty($_POST)) {
    header("access-control-allow-credentials:true");
    header("access-control-allow-headers:Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token");
    header("access-control-allow-methods:POST, GET, OPTIONS");
    header("access-control-allow-origin:".$_SERVER['HTTP_ORIGIN']);
    header("access-control-expose-headers:AMP-Access-Control-Allow-Source-Origin");
    header("amp-access-control-allow-source-origin:https://".$_SERVER['HTTP_HOST']);
    header("Content-Type: application/json");
    $_POST['consumer_from'] = 'amp';
     
    $payload = json_encode($_POST);
    $curl_connection = curl_init('https://api.solarbyluminous.com/requestVisit');
    curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($curl_connection, CURLOPT_POST, true);
    curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $payload );
    $result=curl_exec($curl_connection);
    curl_close($curl_connection);
    print_r($result);
    
}

?>
