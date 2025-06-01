<?php

declare(strict_types=1);

use UIAwesome\Html\{Group\Div, Group\P, Helper\Encode, Semantic\H};
use yii\web\View;

/** @var View $this */
$this->title = Yii::t('app.basic', 'Index');

echo Div::widget()
    ->class('jumbotron jumbotron-fluid text-center')
    ->content(
        H::widget()
            ->class('display-2 fw-bold')
            ->content(Encode::content(Yii::t('app.basic', 'Web Application')))
            ->tagName('h1'),
        P::widget()
            ->class('lead fw-bold')
            ->content(Encode::content(Yii::t('app.basic', 'Yii v.22'))),
    );
