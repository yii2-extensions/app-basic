<?php

declare(strict_types=1);

use yii2\extensions\localeurls\UrlLanguageManager;
use yii\i18n\PhpMessageSource;

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
            'class' => UrlLanguageManager::class,
            'languages' => $params['yii2.localeurls.languages'],
            'enablePrettyUrl' => $params['web.urlManager.enablePrettyUrl'],
            'showScriptName' => $params['web.urlManager.showScriptName'],
        ],
    ],
];
