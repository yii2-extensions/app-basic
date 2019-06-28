<?php

/**
 * Yii bootstrap file.
 *
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

$c3 = dirname(__dir__) . '/c3.php';
$autoload = dirname(__dir__) . '/vendor/autoload.php';
$yii2 = dirname(__dir__) . '/vendor/yiisoft/yii2/Yii.php';

if (!is_file($c3)) {
    die('You need to set up coception/c3 using Composer');
}

if (!is_file($autoload)) {
    die('You need to set up the project dependencies using Composer');
}

if (!is_file($yii2)) {
    die('You need to set up yii2 using composer');
}

require_once $c3;
require_once $autoload;
require_once hiqdev\composer\config\Builder::path('defines');
require_once $yii2;

Yii::setAlias('@root', dirname(__dir__, 1));
Yii::setAlias('@vendor', dirname(__dir__, 1) . '/vendor');
