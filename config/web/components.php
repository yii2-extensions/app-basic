<?php

declare(strict_types=1);

use yii\caching\FileCache;
use yii\i18n\PhpMessageSource;
use yii\log\FileTarget;

/**
 * @var array $params
 */
return [
    'components' => [
        'assetManager' => [
            'basePath' => $params['app.assetManager.basePath'],
        ],
        'cache' => [
            'class' => FileCache::class,
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
            'showScriptName' => $params['app.urlManager.showScriptName'],
        ],
    ],
];
