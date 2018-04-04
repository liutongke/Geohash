<?php
require_once __DIR__ . '/vendor/autoload.php';

use mobile\push\Jpush;

$app_key = '***';
$master_secret = '***';
//来自github的问候来自github的问候来自github的问候来自github的问候来自github的问候来自github的问候来自github的问候来自github的问候来自github的问候来自github的问候
//biubiubiu
$jpush = new Jpush($app_key, $master_secret);
$haha = $jpush->setPlatform('android')
    //设置别名
    ->addAlias('325')
//{"msg_content":"点赞动态","extras":{
//    "content":"阿哲0点赞了你的动态。"},"content_type":"text","title":"点赞动态!"}
    //推送的消息体,安卓调用androidNotification，iOS调用iosNotification
    ->Message(
        [
            //这里指定了，则会覆盖上级统一指定的 alert 信息；内容可以为空字符串，则表示不展示到通知栏。
            "msg_content" => '山有木兮木有枝',
            //这里自定义 JSON 格式的 Key/Value 信息，以供业务使用
            "content_type" => 'text',
            "title" => '测试',
            'extras' => [
                'content' => '心悦君兮君不知',
                "badge" => (int)1,
            ]
        ])
    ->send();
var_dump($haha);

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

$jpush->setPlatform('all')
    ->addAllAudience()
    ->allNotification([
        //这里指定了，则会覆盖上级统一指定的 alert 信息；内容可以为空字符串，则表示不展示到通知栏。
        "alert" => '病起萧萧两鬓华',
        //这里自定义 JSON 格式的 Key/Value 信息，以供业务使用
        'android' => [
            'extras' => [
                'content' => '卧看残月上窗纱',
                "badge" => (int)1,
            ]
        ],
        'ios' => [
            "badge" => (int)2,
//                    如果无此字段，则此消息无声音提示；有此字段，如果找到了指定的声音就播放该声音，否则播放默认声音,如果此字段为空字符串，iOS 7 为默认声音，iOS 8及以上系统为无声音。(消息) 说明：JPush 官方 API Library (SDK) 会默认填充声音字段。提供另外的方法关闭声音。
            "sound" => "",
            'extras' => [
                'content' => '豆蔻连梢煎熟水',
            ]
        ],
    ])
    ->send();
