<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'language' => 'ru-RU',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin']
        ],
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
    ],
    'components' => [
        // 'view' => [
        //     'theme' => [
        //         'pathMap' => [
        //             '@mdm/admin' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
        //         ],
        //     ],
        // ],
        // 'assetManager' => [
        //     'bundles' => [
        //         'dmstr\web\AdminLteAsset' => [
        //             'skin' => 'skin-black',
        //         ],
        //     ],
        // ],
        'authClientCollection' => [
            'class' => yii\authclient\Collection::className(),
            'clients' => [
                // 'facebook' => [
                //     'class'        => 'dektrium\user\clients\Facebook',
                //     'clientId'     => 'CLIENT_ID',
                //     'clientSecret' => 'CLIENT_SECRET',
                // ],
                // 'twitter' => [
                //     'class'          => 'dektrium\user\clients\Twitter',
                //     'consumerKey'    => 'CONSUMER_KEY',
                //     'consumerSecret' => 'CONSUMER_SECRET',
                // ],
                // 'google' => [
                //     'class'        => 'dektrium\user\clients\Google',
                //     'clientId'     => 'CLIENT_ID',
                //     'clientSecret' => 'CLIENT_SECRET',
                // ],
            ],
        ],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Ei_w6VipK56q7g98QhDQkfqIvEeWvekV',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        // 'user' => [
        //     'identityClass' => 'app\models\User',
        //     'enableAutoLogin' => true,
        // ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
