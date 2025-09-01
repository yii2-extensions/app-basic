<?php

declare(strict_types=1);

use app\usecase\site\SiteController;

/** @phpstan-var array<string, mixed> $components */
$components = require __DIR__ . '/components.php';
/** @phpstan-var array<string, mixed> $container */
$container = require __DIR__ . '/container.php';
/** @phpstan-var array<string, mixed> $modules */
$modules = require __DIR__ . '/modules.php';
/** @phpstan-var array<string, mixed> $params */
$params = require dirname(__DIR__) . '/params-web.php';

$rootDir = dirname(__DIR__, 2);

$config = [
    'id' => 'web.basic',
    'aliases' => [
        '@root' => $rootDir,
        '@npm' => '@root/node_modules',
        '@bower' => '@npm',
        '@resource' => '@root/src/framework/resource',
        '@runtime' => '@root/runtime',
    ],
    'basePath' => $rootDir,
    'bootstrap' => ['log'],
    'components' => $components,
    'container' => $container,
    'controllerMap' => [
        'site' => ['class' => SiteController::class],
    ],
    'language' => 'en-US',
    'modules' => $modules,
    'name' => 'Web application basic',
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['bootstrap'][] = 'gii';
}

return $config;
