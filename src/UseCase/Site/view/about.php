<?php

declare(strict_types=1);

use UIAwesome\Html\{Core\HTMLBuilder, Group\Div, Group\P, Helper\Encode, Semantic\H};
use yii\web\View;

/** @var View $this */
$this->title = Yii::t('app.basic', 'About');

echo Div::widget()
    ->class('text-center')
    ->content(
        H::widget()->content(Encode::content($this->title))->class('mb-40 display-4 fw-bold')->tagName('h1'),
        P::widget()
            ->content(
                Yii::t(
                    'app.basic',
                    'This is the About page. You may modify the following file to customize its content.',
                ),
            ),
        HTMLBuilder::createTag('code', __FILE__),
    );
