<?php

declare(strict_types=1);

namespace app\framework\asset;

use yii\bootstrap5\{BootstrapAsset, BootstrapPluginAsset};
use yii\web\{AssetBundle, YiiAsset};

/**
 * Application asset bundle.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
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
