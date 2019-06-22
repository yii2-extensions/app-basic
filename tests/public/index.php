<?php

use hiqdev\composer\config\Builder;
use yii\web\Application;

include '../../c3.php';

define('MY_APP_STARTED', true);
defined('YII_ENV') or define('YII_ENV', true);
defined('YII_DEBUG') or define('YII_DEBUG', true);

(function () {
    require dirname(__DIR__, 2) . '/config/bootstrap.php';

    $config = require Builder::path('tests');

    (new Application($config))->run();
})();
