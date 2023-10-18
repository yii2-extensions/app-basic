<?php

declare(strict_types=1);

use yii\caching\FileCache;
use yii\log\FileTarget;

return [
    'components' => [
        'cache' => [
            'class' => FileCache::class,
        ],
        'log' => [
            'targets' => [
                [
                    'class' => FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
];
