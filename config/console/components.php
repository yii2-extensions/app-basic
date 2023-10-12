<?php

declare(strict_types=1);

/**
 * @var array $params
 */
return [
    'components' => [
        'cache' => [
            'class' => yii\caching\FileCache::class,
        ],
        'log' => [
            'targets' => [
                [
                    'class' => yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
];
