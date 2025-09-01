<?php

declare(strict_types=1);

use app\usecase\hello\HelloController;

/** @phpstan-var array<string, mixed> $components */
$components = require dirname(__DIR__) . '/common/components.php';
/** @phpstan-var array<string, mixed> $container */
$container = require dirname(__DIR__) . '/console/container.php';
/** @phpstan-var array<string, mixed> $params */
$params = require dirname(__DIR__) . '/params-console.php';

return [
    'id' => 'console.basic',
    'basePath' => dirname(__DIR__, 2),
    'bootstrap' => ['log'],
    'components' => $components,
    'container' => $container,
    'controllerMap' => ['hello' => HelloController::class],
    'params' => $params,
];
