<?php

declare(strict_types=1);

namespace app\framework\asset;

use yii\bootstrap5\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\View;

/**
 * Theme toggle asset bundle.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
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
