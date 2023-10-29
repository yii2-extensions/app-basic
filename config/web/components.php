<?php

declare(strict_types=1);

use yii\i18n\PhpMessageSource;
use App\Framework\Widget\languageSwitcher;

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
        'languageSwitcher' => [
            'class' => languageSwitcher::class,
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
