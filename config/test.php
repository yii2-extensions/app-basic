<?php
/**
 * Application configuration shared by all test types
 */

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__).'\\src',
    'vendorPath' => dirname(__DIR__).'\\vendor',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'terabytesoft\app\basic\controllers',
    'aliases' => [
        '@bower' => dirname(__DIR__).'/node_modules',
        '@npm'   => dirname(__DIR__).'/node_modules',
        '@public' => dirname(__DIR__).'/tests/public',
        '@runtime' => dirname(__DIR__).'/tests/public/@runtime',
        '@terabytesoft/app/basic/tests' => dirname(__DIR__).'/tests',
    ],
    'language' => 'en-US',
    'components' => [
        'i18n' => [
            'translations' => [
                'AppBasic' => [
                    'class' => yii\i18n\PhpMessageSource::class,
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'mailer' => [
            'useFileTransport' => true,
        ],
        'assetManager' => [
            'basePath' => '@public/assets',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'request' => [
            'cookieValidationKey' => 'testme-codeception',
            'enableCsrfValidation' => true,
        ],
    ],
    'params' => $params
];

return $config;
