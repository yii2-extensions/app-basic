<?php

declare(strict_types=1);

use app\usecase\security\Identity;
use yii\i18n\PhpMessageSource;
use yii\web\User;
use yii2\extensions\localeurls\UrlLanguageManager;

/** @phpstan-var string[] $commonComponents */
$commonComponents = require dirname(__DIR__) . '/common/components.php';

$config = [
    'assetManager' => [
        'basePath' => '@public/assets',
    ],
    'errorHandler' => [
        'errorAction' => 'site/404',
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
        'cookieValidationKey' => 'your-cookie-validation-key',
        'enableCsrfValidation' => YII_ENV_DEV === false,
    ],
    'urlManager' => [
        'class' => UrlLanguageManager::class,
        'languages' => [
            'de' => 'de-DE',
            'en' => 'en-US',
            'es' => 'es-ES',
            'fr' => 'fr-FR',
            'pt' => 'pt-BR',
            'ru' => 'ru-RU',
            'zh' => 'zh-CN',
        ],
        'enablePrettyUrl' => true,
        'showScriptName' => false,
    ],
    'user' => [
        'class' => User::class,
        'identityClass' => Identity::class,
    ],
];

$config += $commonComponents;

return $config;
