<?php

declare(strict_types=1);

use yii\web\Application;

defined('YII_DEBUG') || define('YII_DEBUG', false);
defined('YII_ENV') || define('YII_ENV', 'dev');

if (getenv('YII_C3')) {
    $c3 = dirname(__DIR__) . '/c3.php';

    if (file_exists($c3)) {
        require_once $c3;
    }
}

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require dirname(__DIR__) . '/config/web/app.php';

$app = new Application($config);
$app->run();
