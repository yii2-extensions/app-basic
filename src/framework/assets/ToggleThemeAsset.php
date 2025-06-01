<?php

declare(strict_types=1);

namespace app\framework\assets;

use yii\bootstrap5\BootstrapAsset;
use yii\web\{AssetBundle, View};

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
