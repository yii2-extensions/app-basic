<?php

declare(strict_types=1);

namespace App\Framework\Asset;

use yii\bootstrap5\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\View;
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
        YiiAsset::class,
        BootstrapAsset::class,
    ];

    public $publishOptions = [
        'only' => [
            'site.css',
        ],
    ];
}
