<?php

declare(strict_types=1);

$config = [
    'debug' => [
        'class' => yii\debug\Module::class,
        // uncomment the following to add your IP if you aren't connecting from localhost.
        'allowedIPs' => ['*'], // allow all IPs for development purposes only, do not use in production
    ],
    'gii' => [
        'class' => yii\gii\Module::class,
        // uncomment the following to add your IP if you aren't connecting from localhost.
        'allowedIPs' => ['*'], // allow all IPs for development purposes only, do not use in production
    ],
];

return YII_ENV_DEV ? $config : [];
