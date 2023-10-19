<?php

declare(strict_types=1);

use App\Framework\EventHandler\ContactEventHandler;
use yii\i18n\PhpMessageSource;
use yii\log\FileTarget;
use yii\symfonymailer\Mailer;
use yii\web\Session;

$params = \array_merge(
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-web.php',
);
$roorDir = \dirname(__DIR__);
$aliases = \array_merge(
    $params['app.aliases'],
    ['@app' => $roorDir],
);

return [
    'aliases' => $aliases,
    'basePath' => $roorDir,
    'bootstrap' => [
        ContactEventHandler::class,
        'log',
    ],
    'components' => [
        'assetManager' => [
            'basePath' => $params['app.assetManager.basePath'],
        ],
        'errorHandler' => [
            'errorAction' => $params['app.errorHandler.errorAction'],
        ],
        'i18n' => [
            'translations' => [
                'app.basic' => [
                    'class' => PhpMessageSource::class,
                ],
            ],
        ],
        'log' => [
            'traceLevel' => 'YII_DEBUG' ? 3 : 0,
            'targets' => [
                [
                    'class' => FileTarget::class,
                    'levels' => ['error', 'warning', 'info'],
                    'logFile' => '@runtime/logs/app.log',
                ],
            ],
        ],
        'request' => [
            'cookieValidationKey' => $params['app.request.cookieValidationKey'],
            'enableCsrfValidation' => $params['app.request.enableCsrfValidation'],
        ],
        'urlManager' => [
            'enablePrettyUrl' => $params['app.urlManager.enablePrettyUrl'],
            'showScriptName' =>  $params['app.urlManager.showScriptName'],
        ],
    ],
    'container' => [
        'definitions' => [
            Mailer::class => [
                'useFileTransport' => $params['app.mailer.useFileTransport'],
            ],
        ],
        'singletons' => [
            Session::class => static function (): Session {
                return new Session();
            },
        ],
    ],
    'controllerMap' => $params['app.controllerMap'] ?? [],
    'id' => 'basic-tests',
    'language' => 'en-US',
    'name' => 'My Project Basic',
    'params' => $params['app.params'] ?? [],
    'runtimePath' => "$rootDir/public/runtime",
];
