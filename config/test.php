<?php

declare(strict_types=1);

use App\Framework\EventHandler\ContactEventHandler;
use App\UseCase\About\AboutController;
use App\UseCase\Contact\ContactController;
use App\UseCase\Site\SiteController;
use yii\i18n\PhpMessageSource;
use yii\symfonymailer\Mailer;
use yii\web\Session;

$params = \array_merge(
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-web.php',
);

return [
    'aliases' => [
        '@app' => \dirname(__DIR__),
        '@bower' => '@app/node_modules',
        '@npm'   => '@app/node_modules',
        '@public' => '@app/public',
        '@web' => '@public',
        '@resource' => '@app/src/Framework/resource',
        '@runtime' => '@public/runtime',
    ],
    'basePath' => \dirname(__DIR__),
    'bootstrap' => [
        ContactEventHandler::class,
        'log'
    ],
    'components' => [
        'assetManager' => [
            'basePath' => \dirname(__DIR__) . '/public/assets',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'i18n' => [
            'translations' => [
                'app.basic' => [
                    'class' => PhpMessageSource::class,
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
            Mailer::class => [
                'useFileTransport' => true,
            ],
        ],
        'singletons' => [
            Session::class => static function (): Session {
                return new Session();
            },
        ],
    ],
    'controllerMap' => [
        'about' => [
            'class' => AboutController::class,
        ],
        'contact' => [
            'class' => ContactController::class,
        ],
        'site' => [
            'class' => SiteController::class,
        ],
    ],
    'id' => 'basic-tests',
    'language' => 'en-US',
    'name' => 'My Project Basic',
    'params' => $params,
    'runtimePath' => \dirname(__DIR__) . '/public/runtime',
];
