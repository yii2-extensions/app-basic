<?php

declare(strict_types=1);

$params = require __DIR__ . '/params.php';

return [
    'id' => 'basic-tests',
    'aliases' => [
        '@root' => dirname(__DIR__),
        '@bower' => '@root/node_modules',
        '@npm'   => '@root/node_modules',
        '@resource' => '@root/src/Framework/resource',
        '@web' => '@root/web',
        '@runtime' => '@web/runtime',
    ],
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerMap' => [
        'about' => [
            'class' => \App\UseCase\About\AboutController::class,
        ],
        'contact' => [
            'class' => \App\UseCase\Contact\ContactController::class,
        ],
        'site' => [
            'class' => \App\UseCase\Site\SiteController::class,
        ],
    ],
    'language' => 'en-US',
    'components' => [
        'assetManager' => [
            'basePath' => dirname(__DIR__) . '/web/assets',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'i18n' => [
            'translations' => [
                'app.basic' => [
                    'class' => \yii\i18n\PhpMessageSource::class,
                ],
            ],
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
        'request' => [
            'cookieValidationKey' => 'test',
            'enableCsrfValidation' => false,
        ],
    ],
    'container' => [
        'definitions' => [
            \yii\symfonymailer\Mailer::class => [
                'useFileTransport' => true,
            ],
        ],
    ],
    'params' => $params,
];
