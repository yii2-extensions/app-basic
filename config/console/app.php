<?php

declare(strict_types=1);

use app\usecase\hello\HelloController;
use yii\console\controllers\ServeController;

/** @var string[] $components */
$components = require dirname(__DIR__) . '/common/components.php';
/** @var string[] $params */
$params = require dirname(__DIR__) . '/params-console.php';

return [
    'id' => 'console.basic',
    'aliases' => [
        '@root' => dirname(__DIR__, 2),
    ],
    'basePath' => dirname(__DIR__, 2),
    'bootstrap' => [
        'log',
    ],
    'components' => $components,
    'controllerMap' => [
        'hello' => HelloController::class,
        'serve' => [
            'class' => ServeController::class,
            'docroot' => '@app/public',
        ],
    ],
    'params' => $params,
];
