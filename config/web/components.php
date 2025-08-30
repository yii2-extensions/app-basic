<?php

declare(strict_types=1);

/** @phpstan-var string[] $commonComponents */
$commonComponents = require dirname(__DIR__) . '/common/components.php';

$config = [
    'errorHandler' => [
        'errorAction' => 'site/404',
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
