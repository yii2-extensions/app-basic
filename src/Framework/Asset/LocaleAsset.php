<?php

declare(strict_types=1);

namespace App\Framework\Asset;

use yii\web\AssetBundle;

/**
 * Asset bundle for locale urls.
 **/
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
