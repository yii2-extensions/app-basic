<?php

declare(strict_types=1);

use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;
use yii\web\User;

$user = null;

if (Yii::$container->has(User::class)) {
    $user = Yii::$container->get(User::class);
}

$menuItems = match ($user?->getIsGuest()) {
    false => Yii::$app->params['app.menu.islogged'],
    default => Yii::$app->params['app.menu.isguest'],
};

$orders = array_column($menuItems, 'order');
array_multisort($orders, SORT_ASC, $menuItems);

NavBar::begin(
    [
        'brandLabel' => Html::img(
            Yii::getAlias('@web/image/yiiframework.svg'),
            [
                'alt' => Yii::$app->name,
                'width' => '200',
            ],
        ),
        'brandUrl'   => Yii::$app->homeUrl,
        'collapseOptions' => [
            'class' => 'justify-content-end',
        ],
        'options'    => [
            'class' => 'navbar navbar bg-body-secondary navbar-expand-lg',
        ],
    ]
);

echo Nav::widget(
    [
        'options' => ['class' => 'navbar-nav'],
        'items'   => $menuItems,
    ]
);

NavBar::end();
