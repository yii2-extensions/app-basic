<?php

declare(strict_types=1);

use app\framework\ApplicationParameters;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Nav;
use yii\helpers\Html;

$menuItems = match (Yii::$app->user->getIsGuest()) {
    false => ApplicationParameters::getMenuIsLogged(),
    default => ApplicationParameters::getMenuIsGuest(),
};

NavBar::begin(
    [
        'brandLabel' => Html::img(
            Yii::getAlias('@web/image/yiiframework.svg'),
            [
                'alt' => Yii::$app->name,
                'title' => Yii::$app->name,
                'width' => 200,
            ]
        ),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg bg-body-tertiary',
        ],
    ]
);

echo Nav::widget(
    [
        'items' => $menuItems,
        'options' => [
            'class' => 'navbar-nav justify-content-end navbar-collapse',
        ],
    ]
);

NavBar::end();
