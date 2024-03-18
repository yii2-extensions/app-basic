<?php

declare(strict_types=1);

use UIAwesome\Html\Component\Cookbook\BootstrapNavBarMenuItemsRigth;
use UIAwesome\Html\Component\Item;
use UIAwesome\Html\Component\Menu;
use UIAwesome\Html\Component\NavBar;
use UIAwesome\Html\Multimedia\Img;
use yii\helpers\Url;
use yii\web\User;

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

echo NavBar::widget(BootstrapNavBarMenuItemsRigth::definitions())
    ->brandImage(
        Img::widget()
            ->alt(Yii::$app->name)
            ->src(Yii::getAlias('@web/image/yiiframework.svg'))
            ->title(Yii::$app->name)
            ->width(200)
    )
    ->brandLink(Yii::$app->homeUrl)
    ->menu(
        Menu::widget()
            ->currentPath(Yii::$app->request->url)
            ->items(...$items)
            ->linkActiveClass('active')
    )
    ->render();
