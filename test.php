<?php
require_once __DIR__ . '/vendor/autoload.php';
use huawei\push\Client;

$client = new Client();
echo $client::world();