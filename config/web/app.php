<?php

declare(strict_types=1);

use app\framework\event\ContactEventHandler;
use app\usecase\contact\ContactController;
use app\usecase\security\SecurityController;
use app\usecase\site\SiteController;

/** @phpstan-var string[] $components */
$components = require __DIR__ . '/components.php';
/** @phpstan-var string[] $modules */
$modules = require __DIR__ . '/modules.php';
/** @phpstan-var string[] $params */
$params = require dirname(__DIR__) . '/params-web.php';

$rootDir = dirname(__DIR__, 2);

$config = [
    'id' => 'web.basic',
    'aliases' => [
        '@root' => $rootDir,
        '@npm' => '@root/node_modules',
        '@public' => '@root/public',
        '@resource' => '@root/src/framework/resource',
        '@runtime' => '@root/runtime',
        '@web' => '/',
    ],
    'basePath' => $rootDir,
    'bootstrap' => [
        ContactEventHandler::class,
        'log',
    ],
    'components' => $components,
    'controllerMap' => [
        'contact' => [
            'class' => ContactController::class,
        ],
        'security' => [
            'class' => SecurityController::class,
        ],
        'site' => [
            'class' => SiteController::class,
        ],
    ],
    'language' => 'en-US',
    'modules' => $modules,
    'name' => 'Web application basic',
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => \yii\debug\Module::class,
        // uncomment the following to add your IP if you aren't connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => \yii\gii\Module::class,
        // uncomment the following to add your IP if you aren't connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
