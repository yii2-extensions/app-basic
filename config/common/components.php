<?php

declare(strict_types=1);

use yii\caching\FileCache;
use yii\log\FileTarget;

/**
 * @var array $params
 */
return [
    'components' => [
        'cache' => [
            'class' => FileCache::class,
        ],
        'log' => [
            'traceLevel' => 'YII_DEBUG' ? 3 : 0,
            'targets' => [
                [
                    'class' => FileTarget::class,
                    'levels' => $params['common.log.levels'],
                    'logFile' => $params['common.log.logFile'],
                ],
            ],
        ],
    ],
];
