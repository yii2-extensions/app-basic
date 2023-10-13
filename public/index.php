<?php

declare(strict_types=1);

use Yiisoft\Config\Config;
use Yiisoft\Config\ConfigPaths;
use Yiisoft\Config\Modifier\RecursiveMerge;

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);

if (getenv('YII_ENV')) {
    defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV'));
} else {
    defined('YII_ENV') or define('YII_ENV', 'dev');
}

if (getenv('YII_C3')) {
    $c3 = dirname(__DIR__) . '/c3.php';

    if (file_exists($c3)) {
        require_once $c3;
    }
}

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = new Config(
    new ConfigPaths(dirname(__DIR__), 'config', 'vendor'),
    modifiers: [RecursiveMerge::groups('web', 'params-web')],
    paramsGroup: 'params-web',
);

(new yii\web\Application($config->get('web')))->run();