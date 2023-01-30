<?php

// QRCO_5FFBB21D-46A3-494D-9F1D-5DAE72A10DD9

$curl = curl_init();

$qrCode = 'QRCO_DB91022C-0C09-4C06-AFBC-AFB8BE41BAD1';

curl_setopt_array($curl, [
  CURLOPT_URL => "https://sandbox.api.pagseguro.com/pix/pay/{$qrCode}",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYPEER => true,
  CURLOPT_CAINFO => "cacert.pem",
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => [
    "Authorization: FF579CC8863549A783664FDC85657678",
    "accept: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
