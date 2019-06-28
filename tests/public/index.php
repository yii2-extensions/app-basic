<?php

/**
 * Yii web bootstrap file
 */

$_bootstrap = dirname(__dir__) . '/_bootstrap.php';

if (!is_file($_bootstrap)) {
    die('You need to set up _bootstrap');
}

require_once $_bootstrap;

(function () {
    $config = require hiqdev\composer\config\Builder::path('tests');
    (new yii\web\Application($config))->run();
})();
