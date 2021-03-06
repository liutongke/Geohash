# 极光推送使用规则
Installation
使用 Composer 安装
在项目中的 composer.json 文件中添加依赖：
```shell
“require”: {
    "mobile/push": "^1.0"
},
```
执行 $ composer update 进行安装。
引入 
```php
use \mobile\push\jpush\Jpush;
$app_key = '***';
$master_secret = '***';
$jpush = new Jpush($app_key, $master_secret);
```

## 通知别名推送(安卓)
```php
$jpush->setPlatform('android')
//设置别名
->addAlias($alias)
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
```
## 通知别名推送(iOS)
```php
$jpush->setPlatform('ios')
//设置别名
->addAlias($alias)
//推送的消息体,安卓调用androidNotification，iOS调用iosNotification
->iosNotification(
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
```
## 通知广播推送
```php
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
 //                   如果无此字段，则此消息无声音提示；有此字段，如果找到了指定的声音就播放该声音，否则播放默认声音,如果此字段为空字符串，iOS 7 为默认声音，iOS 8及以上系统为无声音。(消息) 说明：JPush 官方 API Library (SDK) 会默认填充声音字段。提供另外的方法关闭声音。
                "sound" => "",
                'extras' => [
                    'content' => '豆蔻连梢煎熟水',
                ]
            ],
        ])
        ->send();
```
## 送达统计
```php
$jreport = new Jreport($app_key, $master_secret);
$haha = $jreport->receivedUrl()
    ->received([
        '1654967444'
    ])
    ->send();
```