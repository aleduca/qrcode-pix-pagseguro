<?php

// $payload = $_POST;

// $payload = @file_get_contents('php://input');

// file_put_contents('log.txt', $payload);


if (isset($_POST['notificationCode'], $_POST['notificationType'])) {
  $payload = $_POST;
  $payloadJson = json_encode($_POST);

  $notificationCode = $_POST['notificationCode'];
  $token = 'seu-token-aqui';
  $credentials = "?email=xandecar@hotmail.com&token={$token}";
  // https://alexandrecardoso-pagseguro.ultrahook.com
  $url = "https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/{$payload['notificationCode']}{$credentials}";

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
  curl_setopt($curl, CURLOPT_CAINFO, "cacert.pem");
  curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'Content-Type:application/json',
    'Authorization: Bearer ' . $token
  ]);

  $response = curl_exec($curl);
  $error = curl_error($curl);

  curl_close($curl);

  file_put_contents('logTransaction.txt', $response);
  file_put_contents('payload.txt', $payload);
  file_put_contents('url.txt', $url);
  file_put_contents('notification.txt', $payload['notificationCode']);
} else {
  $payload = @file_get_contents('php://input');

  file_put_contents('logPay.txt', $payload);
}
