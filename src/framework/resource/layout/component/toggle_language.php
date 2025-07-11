<?php

declare(strict_types=1);

use app\framework\asset\LocaleAsset;
use UIAwesome\Html\Graphic\Svg;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/**
 * @var View $this
 */
LocaleAsset::register($this);

$items = [];

$locales = Yii::$app->urlManager->languages;

foreach ($locales as $key => $value) {
    $classes = [
        'dropdown-item',
        'd-flex',
        'align-items-center',
    ];
    $icon = match ($key) {
        'en' => 'us',
        'zh' => 'cn',
        default => $key,
    };

    if (Yii::$app->language === $value) {
        $classes[] = 'active';
    }

    $items[] = Html::a(
        '<i class="fi fi-' . $icon . ' fis me-2"></i> ' . Yii::t('app.basic', "site.selector.language.{$key}"),
        Url::current(['language' => $key]),
        [
            'class' => implode(' ', $classes),
        ],
    );
}
?>
<div class="btn-group dropup">
    <?= Html::button(
        Svg::widget()
            ->attributes(['height' => '24', 'width' => '24'])
            ->class('w-3 h-3')
            ->filePath(Yii::getAlias('@npm/bootstrap-icons/icons/globe.svg'))
            ->render(),
        [
            'aria-expanded' => 'true',
            'aria-label' => 'Toggle language dropdown',
            'class' => 'btn btn-primary dropdown-toggle d-flex align-items-center text-white show',
            'data-bs-toggle' => 'dropdown',
            'title' => 'Select language',
            'type' => 'button',
        ],
    ) ?>
    <div id="dropdown-language">
        <?= Html::ul(
            $items,
            [
                'class' => 'dropdown-menu dropdown-menu-end shadow',
                'encode' => false,
            ],
        ) ?>
    </div>
</div>
