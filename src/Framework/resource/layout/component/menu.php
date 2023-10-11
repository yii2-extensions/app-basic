<?php

declare(strict_types=1);

use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

$menuItems = \Yii::$app->params['app.menu.isguest'];

NavBar::begin(
    [
        'brandLabel' => Html::img(
            \Yii::getAlias('@web/image/yiiframework.svg'),
            [
                'alt' => \Yii::$app->name,
                'width' => '200',
            ],
        ),
        'brandUrl'   => \Yii::$app->homeUrl,
        'collapseOptions' => [
            'class' => 'justify-content-end',
        ],
        'options'    => [
            'class' => 'navbar navbar bg-body-tertiary navbar-expand-lg',
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
