<?php

// $api_categories_list = 'https://sistem.zelnara.com/api/hewan';
    // $json_list = @file_get_contents($api_categories_list);
// $json_list = json_decode($json_list);
// print_r($json_list);
// die();
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://sistem.zelnara.com/api/hewan',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
die();
