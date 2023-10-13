<?php

declare(strict_types=1);

return [
    'app.id' => 'console.basic',
    'app.controllerMap' => [
        'serve' => [
            'class' => \yii\console\controllers\ServeController::class,
            'docroot' => dirname(__DIR__) . '/public',
        ],
    ],
];
