<?php

declare(strict_types=1);

namespace app\framework\asset;

use yii\bootstrap5\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\View;

final class ToggleThemeAsset extends AssetBundle
{
    public $depends = [
        BootstrapAsset::class,
    ];

    public $js = [
        'toggle-theme.js',
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

    public $sourcePath = __DIR__ . '/../resource/js/';
}
