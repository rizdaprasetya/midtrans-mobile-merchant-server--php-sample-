<?php
// Check if request doesn't contains `/charge` in the url/path, display 404
if( !strpos($_SERVER['REQUEST_URI'], '/charge') ) {
  http_response_code(404); 
  echo "wrong path, make sure it's `/charge`"; exit();
}
// Check if method is not HTTP POST, display 404
if( $_SERVER['REQUEST_METHOD'] !== 'POST'){
  http_response_code(404);
  echo "Page not found or wrong HTTP request method is used"; exit();
}

// Set your server key (Note: Server key for sandbox and production mode are different)
$server_key = '<server key>';

// Set true for production, set false for sandbox
$is_production = false;

$api_url = $is_production ? 'https://app.midtrans.com/snap/v1/transactions' : 'https://app.sandbox.midtrans.com/snap/v1/transactions';

// get the HTTP POST body of the request
$request_body = file_get_contents('php://input');

// call charge API using request body passed by mobile SDK, then print out the result
echo chargeAPI($api_url, $server_key, $request_body);

/**
 * call charge API using Curl
 * @param string  $api_url
 * @param string  $server_key
 * @param string  $request_body
 */
function chargeAPI($api_url, $server_key, $request_body){
  $ch = curl_init();
  $curl_options = array(
    CURLOPT_URL => $api_url,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_POST => 1,
    // Add header to the request, including Authorization generated from server key
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json',
      'Accept: application/json',
      'Authorization: Basic ' . base64_encode($server_key . ':')
    ),
    CURLOPT_POSTFIELDS => $request_body
  );
  curl_setopt_array($ch, $curl_options);
  $result = curl_exec($ch);
  return $result;
}