<?php

declare(strict_types=1);

/**
 * @var array $params
 */
return [
    'id' => $params['app.id'] ?? 'console.basic',
    'basePath' => dirname(__DIR__, 2),
    'bootstrap' => $params['app.bootstrap'] ?? [],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@root' => dirname(__DIR__, 2),
        '@resource' => dirname(__DIR__, 2) . '/src/Framework/resource',
        '@tests' => '@app/tests',
    ],
    'controllerMap' => $params['app.controllerMap'] ?? [],
    'params' => $params,
];
