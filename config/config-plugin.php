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
            'web/*.php',
        ],
        'params' => 'params.php',
        'params-console' => [
            '$params',
            'params-console.php',
        ],
        'params-web' => [
            '$params',
            'params-web.php',
        ],
    ],
    'config-plugin-options' => [
        'package-types' => [
            'composer-plugin',
            'library',
            'yii2-extension',
        ],
        'source-directory' => 'config',
    ],
];
