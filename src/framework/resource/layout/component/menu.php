<?php

declare(strict_types=1);

use app\framework\ApplicationParameters;
use yii\bootstrap5\{Nav, NavBar};
use yii\helpers\Html;

NavBar::begin(
    [
        'brandLabel' => Html::img(
            Yii::getAlias('@web/image/yiiframework.svg'),
            [
                'alt' => Yii::$app->name,
                'title' => Yii::$app->name,
                'width' => 200,
            ],
        ),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg bg-body-tertiary',
        ],
    ],
);

echo Nav::widget(
    [
        'items' => ApplicationParameters::getMenuIsGuest(),
        'options' => [
            'class' => 'navbar-nav justify-content-end navbar-collapse',
        ],
    ],
);

NavBar::end();
