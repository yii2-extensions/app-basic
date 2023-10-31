<?php

declare(strict_types=1);

/**
 * @var array $params
 */
$bootstrap = $params['common.bootstrap'] ?? [];

if (isset($params['yii2.debug']) && $params['yii2.debug'] === true) {
    $bootstrap = array_merge($bootstrap, ['debug']);
}

if (isset($params['yii2.gii']) && $params['yii2.gii'] === true) {
    $bootstrap = array_merge($bootstrap, ['gii']);
}

return [
    'id' => $params['app.id'],
    'aliases' => $params['app.aliases'],
    'basePath' => $params['app.root.dir'],
    'bootstrap' => $bootstrap,
    'controllerMap' => $params['app.controllerMap'],
    'language' => $params['app.language'],
    'name' => $params['app.name'],
    'params' => $params['app.params'],
    'runtimePath' => $params['app.root.dir'] . '/public/runtime',
];
