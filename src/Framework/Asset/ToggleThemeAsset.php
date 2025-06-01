<?php

declare(strict_types=1);

namespace App\Framework\Asset;

use yii\bootstrap5\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\View;

/**
 * Asset bundle for the toggle theme.
 **/
final class ToggleThemeAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/../resource/js/';

    public $js = [
        'toggle-theme.js',
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

    public $depends = [
        BootstrapAsset::class,
    ];
}
