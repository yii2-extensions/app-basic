<?php

declare(strict_types=1);

$config = [
    'debug' => [
        'class' => yii\debug\Module::class,
        // development only: allows all IPs.
        // for production, replace '*' with explicit trusted IPs (for example, ['127.0.0.1', '::1']).
        'allowedIPs' => ['*'],
    ],
    'gii' => [
        'class' => yii\gii\Module::class,
        // development only: allows all IPs.
        // for production, replace '*' with explicit trusted IPs (for example, ['127.0.0.1', '::1']).
        'allowedIPs' => ['*'],
    ],
];

return YII_ENV_DEV ? $config : [];
