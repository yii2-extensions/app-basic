<?php

declare(strict_types=1);

$config = [
    'id' => 'app.basic',
    'name' => 'My Project Basic',
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
        'cache' => [
            'class' => \yii\caching\FileCache::class,
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
        'log' => [
            'traceLevel' => 'YII_DEBUG' ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning', 'info'],
                    'logFile' => '@runtime/logs/app.log',
                ],
            ],
        ],
        'request' => [
            'cookieValidationKey' => 'your secret key here',
            'enableCsrfValidation' => true,
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
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
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        // 'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
