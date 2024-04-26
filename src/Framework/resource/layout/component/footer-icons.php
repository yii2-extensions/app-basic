<?php

declare(strict_types=1);

use UIAwesome\Html\{Graphic\Svg, Textual\A};

$linkIconDefinitions = [
    'class()' => ['d-none d-sm-block d-md-block d-lg-block d-xl-block text-muted hover:text-dark text-decoration-none ms-3'],
    'rel()' => ['noopener'],
    'target()' => ['_blank'],
];

$svgDefinitions = [
    'fill()' => ['currentColor'],
    'height()' => ['32'],
];

// Github icon
echo A::widget($linkIconDefinitions)
    ->class('md:block hidden')
    ->content(
        Svg::widget($svgDefinitions)
            ->filePath(Yii::getAlias('@npm/fortawesome--fontawesome-free/svgs/brands/github.svg'))
    )
    ->href('https://github.com/yiisoft')
    ->title('GitHub');

// Slack icon
echo A::widget($linkIconDefinitions)
    ->class('md:block hidden')
    ->content(
        Svg::widget($svgDefinitions)
            ->filePath(Yii::getAlias('@npm/fortawesome--fontawesome-free/svgs/brands//slack.svg'))
    )
    ->href(
        'https://www.yiiframework.com/chat'
    )
    ->title('Slack');

// Facebook icon
echo A::widget($linkIconDefinitions)
    ->class('md:block hidden')
    ->content(
        Svg::widget($svgDefinitions)
            ->filePath(Yii::getAlias('@npm/fortawesome--fontawesome-free/svgs/brands//facebook.svg'))
    )
    ->href('https://www.facebook.com/groups/yiitalk/')
    ->title('Facebook');

// Twitter icon
echo A::widget($linkIconDefinitions)
    ->content(
        Svg::widget($svgDefinitions)
            ->filePath(Yii::getAlias('@npm/fortawesome--fontawesome-free/svgs/brands//twitter.svg'))
    )
    ->href('https://twitter.com/yiiframework')
    ->title('Twitter');

// Telegram icon
echo A::widget($linkIconDefinitions)
    ->content(
        Svg::widget($svgDefinitions)
            ->filePath(Yii::getAlias('@npm/fortawesome--fontawesome-free/svgs/brands//telegram.svg'))
    )
    ->href('https://t.me/yii_framework_in_english')
    ->title('Telegram');
