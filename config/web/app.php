<?php

declare(strict_types=1);

/**
 * @var array $params
 */
return [
    'id' => $params['app.id'],
    'aliases' => $params['common.aliases'],
    'basePath' => $params['common.root.dir'],
    'bootstrap' => $params['common.bootstrap'],
    'controllerMap' => $params['app.controllerMap'],
    'language' => $params['app.language'],
    'name' => $params['app.name'],
    'params' => $params['app.params'],
    'runtimePath' => $params['common.runtime.path'],
];
