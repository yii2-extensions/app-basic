<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

// Load environment variables from .env file
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

define('YII_DEBUG', $_ENV['YII_DEBUG'] ?? false);
define('YII_ENV', $_ENV['YII_ENV'] ?? 'prod');

require_once __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

if (getenv('YII_C3')) {
    $c3 = dirname(__DIR__) . '/c3.php';

    if (file_exists($c3)) {
        require_once $c3;
    }
}

$config = require dirname(__DIR__) . '/config/web/app.php';

$app = new yii\web\Application($config);
$app->run();
