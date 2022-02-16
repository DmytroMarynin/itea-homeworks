<?php

include "../vendor/autoload.php";

$client = new \GuzzleHttp\Client();
$response = $client->request('GET', 'https://itea.ua/');

if ($response->getStatusCode() == '200') {
    echo $response->getBody();
} else {
    echo "Something happend and your status = " . $response->getStatusCode();
}