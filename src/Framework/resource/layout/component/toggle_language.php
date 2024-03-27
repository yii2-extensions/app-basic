<?php

declare(strict_types=1);

use App\Framework\Asset\LocaleAsset;
use UIAwesome\Html\Component\Bootstrap5\{Dropdown, Item};
use yii\{helpers\Url, web\View};

/**
 * @var string $languageLabel
 * @var View $this
 */
LocaleAsset::register($this);

$items = [];

$locales = Yii::$app->params['app.localeurls.languages'] ?? [];

foreach ($locales as $key => $value) {
    $icon = match ($key) {
        'en' => 'us',
        'zh' => 'cn',
        default => $key,
    };

    if (Yii::$app->language === $value) {
        $languageLabel = "site.selector.language.$key";
    }

    $items[] = Item::widget()
        ->iconClass('fi fi-' . $icon . ' fis me-2')
        ->label(Yii::t('app.basic', "site.selector.language.$key"))
        ->link(Url::current(['language' => $key]))
        ->active(Yii::$app->language === $value);
}

echo Dropdown::widget()->definition('language')->items(...$items);
