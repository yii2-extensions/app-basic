<?php

declare(strict_types=1);

namespace app\framework\assets;

use yii\bootstrap5\{BootstrapAsset, BootstrapPluginAsset};
use yii\web\{AssetBundle, YiiAsset};

final class AppAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/../resource/';

    public $css = [
        'css/site.css',
    ];

    public $depends = [
        BootstrapAsset::class,
        BootstrapPluginAsset::class,
        YiiAsset::class,
    ];

    public $publishOptions = [
        'only' => [
            'site.css',
        ],
    ];
}
