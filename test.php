<?php
require_once __DIR__ . '/vendor/autoload.php';

use mobile\push\Jpush;

$app_key = '***';
$master_secret = '***';

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
