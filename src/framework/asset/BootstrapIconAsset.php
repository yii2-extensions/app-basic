<?php

declare(strict_types=1);

namespace app\framework\asset;

use yii\web\AssetBundle;

final class BootstrapIconAsset extends AssetBundle
{
    public $sourcePath = '@npm/bootstrap-icons/font';

    public $css = [
        'bootstrap-icons.css'
    ];
}
