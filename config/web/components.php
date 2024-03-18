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
            'basePath' => $params['web.assetManager.basePath'],
        ],
        'errorHandler' => [
            'errorAction' => $params['web.errorHandler.errorAction'],
        ],
        'i18n' => [
            'translations' => [
                'app.basic' => [
                    'class' => PhpMessageSource::class,
                    'basePath' => '@resource/message',
                    'sourceLanguage' => 'en',
                ],
            ],
        ],
        'request' => [
            'cookieValidationKey' => $params['web.request.cookieValidationKey'],
            'enableCsrfValidation' => $params['web.request.enableCsrfValidation'],
        ],
        'urlManager' => [
            'class' => $params['yii2.urlManager.class'] ?? UrlManager::class,
            'enablePrettyUrl' => $params['web.urlManager.enablePrettyUrl'],
            'showScriptName' => $params['web.urlManager.showScriptName'],
        ],
    ],
];
