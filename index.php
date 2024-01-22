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
$jsonString = file_get_contents('..\challenge\FE_Challenge\products.js');

// Decode the JSON string into a PHP associative array
$data = json_decode($jsonString, true);

// Check if decoding was successful
if ($data !== null) {
    // Define an array of keys you want to retrieve
    $keysToRetrieve = ['id', 'brand', 'image', 'style', 'substyle', 'abv', 'origin', 'information'];

    // Iterate over each key-value pair in the associative array
    foreach ($data as $key => $value) {
        // Check if the current key is in the keysToRetrieve array
        if (in_array($key, $keysToRetrieve)) {
            $data = [
                'name' => $key['brand'],
                'type' => 'simple',
                'style': $key['style'],
                'substyle': $key['substyle'],
                'origin': $key['origin'],
                'description' => $key['information'],
                'images' => [
                    [
                        'src' => $key['image']
                    ],
                    [
                        'src' => $key['image']
                    ]
                ]
            ];
            
            print_r($woocommerce->post('products', $data));
        }
    }
} else {
    echo "Error decoding JSON string.\n";
}

?>