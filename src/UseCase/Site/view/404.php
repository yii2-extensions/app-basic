<?php

declare(strict_types=1);

use PHPForge\Html\Div;
use PHPForge\Html\H;
use PHPForge\Html\Helper\Encode;
use PHPForge\Html\Img;
use yii\web\View;

/**
 * @var string $message
 * @var string $name
 * @var View $this
 */
$this->title = $name;

echo Div::widget()
    ->class('d-flex flex-column align-items-center justify-center')
    ->content(
        Div::widget()
            ->class('text-center mb-3')
            ->content(
                Img::widget()
                    ->alt('404')
                    ->class('img-fluid mb-4')
                    ->src(
                        'https://raw.githubusercontent.com/yii-tools/.github/61bbcb1b1f777740cce4200f95ae4bc0aa4350a8/images/app/404.svg',
                    )
            ),
        Div::widget()
            ->class('text-center mb-3')
            ->content(
                H::widget()->class('mb-4')->content(Encode::content($this->title))->tagName('h1'),
                H::widget()
                    ->content(
                        Encode::content(Yii::t('app.basic', 'Oops! Looks like you followed a bad link.'))
                    )
                    ->tagName('h6'),
                H::widget()
                    ->content(
                        Encode::content(Yii::t('app.basic', 'If you think this is a problem with us, please tell us.'))
                    )
                    ->tagName('h6'),
            )
    );
