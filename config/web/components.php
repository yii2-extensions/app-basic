<?php

declare(strict_types=1);

use yii\i18n\PhpMessageSource;

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
