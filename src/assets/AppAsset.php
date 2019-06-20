<?php
namespace terabytesoft\app\basic\assets;

use yii\web\AssetBundle;

/**
 * AppAsset.
 *
 * Assets web application basic
 **/
class AppAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/css';

    public $css = [
        'site.css',
    ];

    public $js = [
    ];

    public $depends = [
        \yii\web\YiiAsset::class,
        \yii\bootstrap4\BootstrapAsset::class,
    ];
}
