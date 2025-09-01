<?php

declare(strict_types=1);

use yii2\extensions\debug\WorkerDebugModule;
use yii\gii\Module;

$config = [
    'debug' => [
        'class' => WorkerDebugModule::class,
        // uncomment the following to add your IP if you aren't connecting from localhost.
        'allowedIPs' => ['*'],
    ],
    'gii' => [
        'class' => Module::class,
        // uncomment the following to add your IP if you aren't connecting from localhost.
        'allowedIPs' => ['*'],
    ],
];

return YII_ENV_DEV ? $config : [];
