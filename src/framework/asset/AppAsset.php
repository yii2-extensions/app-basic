<?php

declare(strict_types=1);

namespace app\framework\asset;

use yii\bootstrap5\BootstrapAsset;
use yii\bootstrap5\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

final class AppAsset extends AssetBundle
{
    public $css = [
        'css/site.css',
    ];

    public $depends = [
        BootstrapAsset::class,
        BootstrapIconAsset::class,
        BootstrapPluginAsset::class,
        YiiAsset::class,
    ];

    public $sourcePath = __DIR__ . '/../resource/';
}
