<?php

declare(strict_types=1);

namespace app\framework\asset;

use yii\web\AssetBundle;

final class BootstrapIconAsset extends AssetBundle
{
    public $css = [
        'bootstrap-icons.css',
    ];

    public $sourcePath = '@npm/bootstrap-icons/font';
}
