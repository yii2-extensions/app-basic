<?php

declare(strict_types=1);

use yii\i18n\PhpMessageSource;

/** @phpstan-var string[] $commonComponents */
$commonComponents = require dirname(__DIR__) . '/common/components.php';

$config = [
    'errorHandler' => [
        'errorAction' => 'site/404',
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
        'cookieValidationKey' => 'your-cookie-validation-key',
        'enableCsrfValidation' => YII_ENV_DEV === false,
    ],
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
    ],
];

$config += $commonComponents;

return $config;
