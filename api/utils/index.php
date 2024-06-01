<?php
function sendSMS($recipient, $message) {
    $url = 'https://api.taqnyat.sa/v1/messages';
    $api_key = '6e45c7f269fb9a6009acba3f3d9729b8';
    $sender = 'AppsCo';

    $data = array(
        'recipients' => array($recipient),
        'body' => $message,
        'sender' => $sender
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

    return $response;
}
?>