<?php

declare(strict_types=1);

return [
    'config-plugin' => [
        'common' => 'common/*.php',
        'console' => [
            '$common',
            'console/*.php',
        ],
        'web' => [
            '$common',
            '$yii2-debug',
            '$yii2-gii',
            '$yii2-localeurls',
            'web/*.php'
        ],
        'params' => 'params.php',
        'params-console' => [
            '$params',
            'params-console.php'
        ],
        'params-web' => [
            '$params',
            'params-web.php'
        ],
    ],
    'config-plugin-options' => [
        'source-directory' => 'config',
    ],
];
