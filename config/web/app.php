<?php

declare(strict_types=1);

/**
 * @var array $params
 */
return [
    'id' => $params['web.id'],
    'aliases' => $params['common.aliases'],
    'basePath' => $params['common.root.dir'],
    'bootstrap' => $params['common.bootstrap'],
    'controllerMap' => $params['web.controllerMap'],
    'language' => $params['web.language'],
    'name' => $params['web.name'],
    'params' => $params['web.params'],
    'runtimePath' => $params['common.runtime.path'],
];
