<?php

declare(strict_types=1);

/**
 * @var array $params
 */
$bootstrap = $params['app.bootstrap'] ?? [];

if (isset($params['yii.debug']) && $params['yii.debug'] === true) {
    $bootstrap = array_merge($bootstrap, ['debug']);
}

if (isset($params['yii.gii']) && $params['yii.gii'] === true) {
    $bootstrap = array_merge($bootstrap, ['gii']);
}

return [
    'aliases' => [
        '@app' => dirname(__DIR__, 2),
        '@bower' => '@app/node_modules',
        '@npm'   => '@app/node_modules',
        '@public' => '@app/public',
        '@web' => '@public',
        '@resource' => '@app/src/Framework/resource',
        '@runtime' => '@public/runtime',
    ],
    'basePath' => dirname(__DIR__, 2),
    'bootstrap' => $bootstrap,
    'controllerMap' => $params['app.controllerMap'] ?? [],
    'id' => $params['app.id'] ?? 'app.basic',
    'language' => $params['app.language'] ?? 'en-US',
    'name' => $params['app.name'] ?? 'app basic example',
    'params' => $params,
    'runtimePath' => dirname(__DIR__, 2) . '/public/runtime',
];
