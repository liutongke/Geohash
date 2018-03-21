<?php
require_once __DIR__ . '/vendor/autoload.php';
use huawei\push\Client;
use huawei\push\Http;

//$client = new Client();
//echo $client::world();

//应用id
//define("HUAWEI_PUSH_CLIENT_SECRET", "");
//appid
//define("HUAWEI_PUSH_CLIENT_ID", "");
$http = new Http();
echo $http->GetToken();
//echo $http->GetToken();