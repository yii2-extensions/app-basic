<?php

declare(strict_types=1);

use yii\console\controllers\ServeController;

$rootDir = \dirname(__DIR__);

return [
    'app.aliases' => [
        '@app' => $rootDir,
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@resource' => '@app/src/Framework/resource',
        '@tests' => '@app/tests',
    ],
    'app.id' => 'console.basic',
    'app.controllerMap' => [
        'serve' => [
            'class' => ServeController::class,
            'docroot' => "$rootDir/public",
        ],
    ],
    'app.params' => [],
    'app.root.dir' => $rootDir,
];
