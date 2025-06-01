<?php

declare(strict_types=1);

use app\usecase\hello\HelloController;
use yii\console\controllers\ServeController;

$rootDir = dirname(__DIR__);

return [
    'console.id' => 'console.basic',
    'console.controllerMap' => [
        'hello' => HelloController::class,
        'serve' => [
            'class' => ServeController::class,
            'docroot' => "$rootDir/public",
        ],
    ],
    'console.params' => [],
];
