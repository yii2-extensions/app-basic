<?php

declare(strict_types=1);

use yii\gii\Module;
use yii2\extensions\debug\WorkerDebugModule;

$config = [
    'debug' => [
        'class' => WorkerDebugModule::class,
        // development only: allows all IPs.
        // for production, replace '*' with explicit trusted IPs (for example, ['127.0.0.1', '::1']).
        'allowedIPs' => ['*'],
    ],
    'gii' => [
        'class' => Module::class,
        // development only: allows all IPs.
        // for production, replace '*' with explicit trusted IPs (for example, ['127.0.0.1', '::1']).
        'allowedIPs' => ['*'],
    ],
];

return YII_ENV_DEV ? $config : [];
