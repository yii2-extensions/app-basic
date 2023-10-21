<?php

declare(strict_types=1);

return [
    'config-plugin' => [
        'console' => 'console/*.php',
        'web' => [
            '$yii2-debug',
            '$yii2-gii',
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
