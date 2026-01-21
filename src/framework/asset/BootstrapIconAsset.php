<?php

declare(strict_types=1);

namespace app\framework\asset;

use yii\web\AssetBundle;

/**
 * Bootstrap Icons asset bundle.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
final class BootstrapIconAsset extends AssetBundle
{
    public $css = [
        'bootstrap-icons.css',
    ];

    public $sourcePath = '@npm/bootstrap-icons/font';
}
