<?php



$consumer_key = "ck_05d2a0385f01acf1f5e1710ab718bf91254347db";
$consumer_secret = "cs_33fd14f1d7c35d079dc1991d300806bc8c352f7e";

require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;

$woocommerce = new Client(
  'http://traemelo.local/',
  $consumer_key,
  $consumer_secret,
  [
    'version' => 'wc/v3',
  ]
);

<?php

// Your JSON string
$jsonString = file_get_contents('..\challenge\FE_Challenge\stock-price.js');

// Decode the JSON string into a PHP associative array
$data = json_decode($jsonString, true);

// Check if decoding was successful
if ($data !== null) {
    $data = [
        'regular_price' => $data[0][1]
        'stock'=> $data[0][0]
    ];
    
    print_r($woocommerce->put('products/'$data[0]'', $data));
} else {
    echo "Error decoding JSON string.\n";
}

?>