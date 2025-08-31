<?php

declare(strict_types=1);

use yii2\extensions\debug\WorkerDebugModule;
use yii\gii\Module;

$config = [
    'debug' => [
        'class' => WorkerDebugModule::class,
        // uncomment the following to add your IP if you aren't connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ],
    'gii' => [
        'class' => Module::class,
        // uncomment the following to add your IP if you aren't connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ],
];

return YII_ENV_DEV ? $config : [];
