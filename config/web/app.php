<?php

declare(strict_types=1);

/**
 * @var array $params
 */
$bootstrap = $params['app.bootstrap'] ?? [];

if (isset($params['yii.debug']) && $params['yii.debug'] === true) {
    $bootstrap = \array_merge($bootstrap, ['debug']);
}

if (isset($params['yii.gii']) && $params['yii.gii'] === true) {
    $bootstrap = \array_merge($bootstrap, ['gii']);
}

return [
    'id' => $params['app.id'] ?? 'app.basic',
    'aliases' => $params['app.aliases'] ?? [],
    'basePath' => \dirname(__DIR__, 2),
    'bootstrap' => $bootstrap,
    'controllerMap' => $params['app.controllerMap'] ?? [],
    'language' => $params['app.language'] ?? 'en-US',
    'name' => $params['app.name'] ?? 'Web application basic',
    'params' => $params['app.params'] ?? [],
    'runtimePath' => \dirname(__DIR__, 2) . '/public/runtime',
];
