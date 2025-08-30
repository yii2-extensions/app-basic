<?php

declare(strict_types=1);

$config = [
    'debug' => [
        'class' => yii\debug\Module::class,
        // uncomment the following to add your IP if you aren't connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ],
    'gii' => [
        'class' => yii\gii\Module::class,
        // uncomment the following to add your IP if you aren't connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ],
];

return YII_ENV_DEV ? $config : [];
