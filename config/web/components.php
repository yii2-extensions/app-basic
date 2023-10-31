<?php

declare(strict_types=1);

use yii\i18n\PhpMessageSource;
use yii\web\UrlManager;

/**
 * @var array $params
 */
return [
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
                    'basePath' => '@resource/message',
                ],
            ],
        ],
        'request' => [
            'cookieValidationKey' => $params['app.request.cookieValidationKey'],
            'enableCsrfValidation' => $params['app.request.enableCsrfValidation'],
        ],
        'urlManager' => [
            'class' => $params['yii2.urlManager.class'] ?? UrlManager::class,
            'enablePrettyUrl' => $params['app.urlManager.enablePrettyUrl'],
            'showScriptName' => $params['app.urlManager.showScriptName'],
        ],
    ],
];
