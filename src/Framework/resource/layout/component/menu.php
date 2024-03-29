<?php

declare(strict_types=1);

use UIAwesome\Html\{
    Component\Bootstrap5\Item,
    Component\Bootstrap5\Menu,
    Component\Bootstrap5\NavBar,
    Multimedia\Img
};
use yii\{helpers\Url, web\User};

$user = null;

if (Yii::$container->has(User::class)) {
    $user = Yii::$container->get(User::class);
}

$menuItems = match ($user?->getIsGuest()) {
    false => Yii::$app->params['app.menu.islogged'],
    default => Yii::$app->params['app.menu.isguest'],
};

$items = [];

foreach ($menuItems as $key => $item) {
    if (isset($item['label']) && is_string($item['label'])) {
        $category = $item['category'] ?? 'app.basic';
        $menuItems[$key]['label'] = Yii::t($category, $item['label']);
    }

    $items[$key] = Item::widget()
        ->label($item['label'] ?? '')
        ->link(Url::to($item['link'] ?? '#'))
        ->linkAttributes($item['linkAttributes'] ?? []);
}

$orders = array_column($menuItems, 'order');
array_multisort($orders, SORT_ASC, $menuItems);

echo NavBar::widget()
    ->brandImage(
        Img::widget()
            ->alt(Yii::$app->name)
            ->src(Yii::getAlias('@web/image/yiiframework.svg'))
            ->title(Yii::$app->name)
            ->width(200)
    )
    ->brandLink(Yii::$app->homeUrl)
    ->cookbook('align-right')
    ->menu(Menu::widget()->currentPath(Yii::$app->request->url)->items(...$items))
    ->render();
