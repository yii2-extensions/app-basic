<?php

declare(strict_types=1);

use UIAwesome\Html\Graphic\Svg;
use yii\helpers\Html;

$socialLinks = [
    ['icon' => 'github.svg', 'url' => 'https://github.com/yiisoft', 'title' => 'GitHub'],
    ['icon' => 'slack.svg', 'url' => 'https://join.slack.com/t/yii/shared_invite/...', 'title' => 'Slack'],
    ['icon' => 'facebook.svg', 'url' => 'https://www.facebook.com/groups/yiitalk/', 'title' => 'Facebook'],
    ['icon' => 'twitter.svg', 'url' => 'https://twitter.com/yiiframework', 'title' => 'Twitter'],
    ['icon' => 'telegram.svg', 'url' => 'https://t.me/yii_framework_in_english', 'title' => 'Telegram'],
];

foreach ($socialLinks as $link): ?>
    <?= Html::a(
        Svg::widget()
            ->attributes(['height' => '24', 'width' => '24'])
            ->filePath(Yii::getAlias('@npm/bootstrap-icons/icons/' . $link['icon']))
            ->render(),
        $link['url'],
        [
            'class' => 'd-none d-sm-block d-md-block d-lg-block d-xl-block text-muted text-decoration-none ms-3',
            'rel' => 'noopener',
            'title' => $link['title'],
        ],
    ) ?>
<?php endforeach;
