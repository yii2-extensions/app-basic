<?php

declare(strict_types=1);

return [
    'config-plugin' => [
        'console' => 'console.php',
        'web' => 'web.php',
        'params' => 'params.php',
    ],
    'config-plugin-environments' => [
        'tests' => [
            'test' => 'test.php',
        ],
    ],
    'config-plugin-options' => [
        'source-directory' => 'config',
    ],
];
