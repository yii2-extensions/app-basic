<?php

declare(strict_types=1);

/**
 * @var array $params
 */
return [
    'id' => $params['app.id'] ?? 'console.basic',
    'aliases' => $params['app.aliases'] ?? [],
    'basePath' => \dirname(__DIR__, 2),
    'bootstrap' => $params['app.bootstrap'] ?? [],
    'controllerMap' => $params['app.controllerMap'] ?? [],
    'params' => $params,
    'runtimePath' => \dirname(__DIR__, 2) . '/public/runtime',
];
