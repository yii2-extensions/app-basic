<?php

declare(strict_types=1);

use yii\caching\FileCache;
use yii\log\FileTarget;

return [
    'cache' => [
        'class' => FileCache::class,
    ],
    'log' => [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'targets' => [
            [
                'class' => FileTarget::class,
                'levels' => [
                    'error',
                    'info',
                    'warning',
                ],
                'logFile' => '@runtime/logs/app.log',
            ],
        ],
    ],
];
