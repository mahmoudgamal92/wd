<?php
$phone = (int)$_POST['phone'];
$msg = $_POST['message'];

$url = 'https://api.taqnyat.sa/v1/messages';
$api_key = '6e45c7f269fb9a6009acba3f3d9729b8';
$data = array(
    'recipients' => array($phone),
    'body' => $msg,
    'sender' => 'AppsCo'
);

$headers = array(
    'Authorization: Bearer ' . $api_key,
    'Content-Type: application/json'
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
curl_close($ch);
echo $response;
?>