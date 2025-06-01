<?php

declare(strict_types=1);

$rootDir = dirname(__DIR__);

return [
    'common.aliases' => [
        '@app' => $rootDir,
        '@resource' => '@app/src/framework/resource',
    ],
    'common.bootstrap' => ['log'],
    'common.log.levels' => ['error', 'warning', 'info'],
    'common.log.logFile' => '@runtime/logs/app.log',
    'common.mailer.useFileTransport' => true,
    'common.root.dir' => $rootDir,
    'common.runtime.path' => $rootDir . '/public/runtime',
];
