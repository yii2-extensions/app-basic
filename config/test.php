<?php

declare(strict_types=1);

$params = array_merge(
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-web.php',
);

return [
    'aliases' => [
        '@app' => dirname(__DIR__),
        '@bower' => '@app/node_modules',
        '@npm'   => '@app/node_modules',
        '@public' => '@app/public',
        '@web' => '@public',
        '@resource' => '@app/src/Framework/resource',
        '@runtime' => '@public/runtime',
    ],
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'assetManager' => [
            'basePath' => dirname(__DIR__) . '/public/assets',
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
        'singletons' => [
            \yii\web\Session::class => static function (): \yii\web\Session {
                return new \yii\web\Session();
            },
        ],
    ],
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
    'id' => 'basic-tests',
    'language' => 'en-US',
    'name' => 'My Project Basic',
    'params' => $params,
    'runtimePath' => dirname(__DIR__) . '/public/runtime',
];
