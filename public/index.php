<?php

declare(strict_types=1);

// Define YII constants from environment variables
defined('YII_DEBUG') || define('YII_DEBUG', filter_var(getenv('YII_DEBUG') ?: 'false', FILTER_VALIDATE_BOOLEAN));
defined('YII_ENV') || define('YII_ENV', getenv('YII_ENV') ?: 'prod');

if (getenv('YII_C3')) {
    $c3 = dirname(__DIR__) . '/c3.php';

    if (file_exists($c3)) {
        require_once $c3;
    }
}

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

// Load environment variables from .env file
$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

$config = require dirname(__DIR__) . '/config/web/app.php';

$app = new \yii\web\Application($config);
$app->run();
