<?php
require_once __DIR__ . '/vendor/autoload.php';
//require_once __DIR__ . '/Jpush.php';
use huawei\push\Client;
use huawei\push\Http;
use huawei\push\Push;
use huawei\push\Jpush;

$app_key = 'aed8819fcc431a8909f8b0e8';
$master_secret = '82d9b8d8c756b3737af2cb7c';
$jpush = new Jpush($app_key, $master_secret);

$haha = $jpush->setPlatform('android')
    //设置别名
    ->addAlias('325')
    //推送的消息体,安卓调用androidNotification，iOS调用iosNotification
    ->androidNotification(
        [
            //这里指定了，则会覆盖上级统一指定的 alert 信息；内容可以为空字符串，则表示不展示到通知栏。
            "alert" => '山有木兮木有枝',
            //这里自定义 JSON 格式的 Key/Value 信息，以供业务使用
            'extras' => [
                'content' => '心悦君兮君不知',
                "badge" => (int)1,
            ]
        ])
    ->send();
var_dump($haha);
die;

$push = new Push();
$res = $push->setMsg(1, [
    'content' => 'push content',
    'title' => 'push title'
])
    ->setAction(2, 'www.baidu.com')
    ->setExt('Trump', [
        'season' => 'Spring',
        'weather' => 'raining'
    ])
//    ->setExt('Trump')
    ->send_huawei_push('351539070400694');
var_dump($res);
die;
//$client = new Client();
//echo $client::world();

//应用id
//define("HUAWEI_PUSH_CLIENT_SECRET", "");
//appid
//define("HUAWEI_PUSH_CLIENT_ID", "");
//$http = new Http();
//echo $http->GetToken();
//echo $http->GetToken();
$to_arr = '科科很帅。';
//                发送的人地址 要发送的数据 发送的设备 要更改的表的id字段
//角标数量
$badge = '1';
$jpush = new \Jpush('aed8819fcc431a8909f8b0e8', '82d9b8d8c756b3737af2cb7c');
/*
 * $to_comment_id 推送的地址， 精准推送的话用别名 ，全局广播用“all”
 * $to_arr 推送的内容
 * $badge 角标数量，iOS必须传递否则报错
 *$to_user->os 区分系统 android ios
 */
$to_comment_id = '324';
$jpush->send_pub($to_comment_id, $to_arr, $to_arr, $badge, 'android');