<?php

declare(strict_types=1);

use yii\console\controllers\ServeController;

return [
    'app.aliases' => [
        '@app' => \dirname(__DIR__),
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@resource' => '@app/src/Framework/resource',
        '@tests' => '@app/tests',
    ],
    'app.id' => 'console.basic',
    'app.controllerMap' => [
        'serve' => [
            'class' => ServeController::class,
            'docroot' => \dirname(__DIR__) . '/public',
        ],
    ],
    'app.params' => [],
];
