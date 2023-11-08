<?php

declare(strict_types=1);

/**
 * @var array $params
 */
return [
    'id' => $params['console.id'],
    'aliases' => $params['common.aliases'],
    'basePath' => dirname(__DIR__, 2),
    'bootstrap' => $params['common.bootstrap'],
    'controllerMap' => $params['console.controllerMap'],
    'params' => $params['console.params'],
    'runtimePath' => $params['common.runtime.path'],
];
