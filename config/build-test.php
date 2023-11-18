<?php

declare(strict_types=1);

use Yiisoft\Config\Config;
use Yiisoft\Config\ConfigPaths;
use Yiisoft\Config\Modifier\RecursiveMerge;

$rootDir = dirname(__DIR__);

$config = new Config(
    new ConfigPaths($rootDir, 'config', 'vendor'),
    modifiers: [RecursiveMerge::groups('web', 'params-web')],
    paramsGroup: 'params-web',
);

return $config->get('web');
