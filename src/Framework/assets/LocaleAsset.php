<?php

declare(strict_types=1);

namespace app\framework\assets;

use yii\web\AssetBundle;

final class LocaleAsset extends AssetBundle
{
    public $sourcePath = '@npm/flag-icons/';

    public $css = [
        'css/flag-icons.css',
    ];

    public $publishOptions = [
        'only' => [
            'flag-icons.css',
            'flags/**/*',
        ],
    ];
}
