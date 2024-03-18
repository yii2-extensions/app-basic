<?php

declare(strict_types=1);

namespace App\Framework\Asset;

use Yii2\Asset\BootstrapAsset;
use Yii2\Asset\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Asset bundle for the web application.
 **/
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
