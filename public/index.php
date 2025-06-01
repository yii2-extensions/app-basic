<?php

declare(strict_types=1);

use yii\web\Application;
use Yiisoft\Config\Config;
use Yiisoft\Config\ConfigPaths;
use Yiisoft\Config\Modifier\RecursiveMerge;

defined('YII_DEBUG') || define('YII_DEBUG', true);
defined('YII_ENV') || define('YII_ENV', 'dev');

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
    modifiers: [RecursiveMerge::groups('web', 'params', 'params-web')],
    paramsGroup: 'params-web',
);

$container = Yii::$container->setSingleton(Application::class, $config->get('web'));
$app = Yii::$container->get(Application::class);
$app->run();
