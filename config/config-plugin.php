<?php

declare(strict_types=1);

return [
    'config-plugin' => [
        'params' => ['params.php'],
        'web' => 'web.php',
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
