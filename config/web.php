<?php

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__).'\\src',
    'vendorPath' => dirname(__DIR__).'\\vendor',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'terabytesoft\app\basic\controllers',
    'aliases' => [
        '@bower' => dirname(__DIR__).'/node_modules',
        '@npm'   => dirname(__DIR__).'/node_modules',
        '@runtime' => dirname(__DIR__).'/@runtime',
    ],
    'components' => [
        'i18n' => [
            'translations' => [
                'AppBasic' => [
                    'class' => yii\i18n\PhpMessageSource::class,
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'testme',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
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
            'traceLevel' => 'YII_DEBUG' ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => [
            'class' => $params['app.basic.db.class'],
            'dsn' => $params['app.basic.db.dns'],
            'username' => $params['app.basic.db.username'],
            'password' => $params['app.basic.db.password'],
            'charset' => $params['app.basic.db.charset'],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
];

return $config;
