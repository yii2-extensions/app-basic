<?php

/**
 * Test application configuration shared by all test types
 */

$appbasic = require __DIR__ . '/appbasic.php';
$params = require __DIR__ . '/params.php';

$params = array_merge($appbasic, $params ?? []);

$config = [
    'id' => 'test.app.basic',
    'name' => $params['app.basic.name'],
    'aliases' => [
        '@bower' => '@root/node_modules',
        '@npm'   => '@root/node_modules',
        '@public' => '@root/tests/public',
        '@runtime' => '@root/tests/public/@runtime',
        '@terabytesoft/app/basic/tests' => '@root/tests',
    ],
    'basePath' => '@root/src',
    'bootstrap' => $params['app.basic.bootstrap'],
    'controllerNamespace' => $params['app.basic.controller.namespace'],
    'language' => $params['app.basic.language'],
    'vendorPath' => $params['app.basic.vendor.path'],
    'components' => [
        'assetManager' => [
            'basePath' => $params['app.basic.assetmanager.base.path'],
        ],
        'i18n' => [
            'translations' => [
                'app.basic' => [
                    'class' => yii\i18n\PhpMessageSource::class,
                ],
            ],
        ],
        'log' => [
            'traceLevel' => 'YII_DEBUG' ? 3 : 0,
            'targets' => [
                [
                    'class' => yii\log\FileTarget::class,
                    'levels' => $params['app.basic.log.levels'],
                    'logFile' => $params['app.basic.log.logFile'],
                ],
            ],
        ],
        'mailer' => [
            'useFileTransport' => $params['app.basic.mailer.usefiletransport'],
        ],
        'request' => [
            'cookieValidationKey' => $params['app.basic.request.cookievalidationkey'],
            'enableCsrfValidation' => $params['app.basic.request.enablecsrfvalidation'],
        ],
        'urlManager' => [
            'enablePrettyUrl' => $params['app.basic.urlmanager.enableprettyurl'],
            'showScriptName' => $params['app.basic.urlmanager.showscriptname'],
        ],
    ],
    'params' => $params,
];

return $config;
