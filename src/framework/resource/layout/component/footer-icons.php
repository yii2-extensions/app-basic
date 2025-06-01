<?php

declare(strict_types=1);

use UIAwesome\Html\{Graphic\Svg};
use yii\helpers\Html;

?>

<?= Html::a(
    Svg::widget()
        ->attributes(['height' => '24', 'width' => '24'])
        ->filePath(Yii::getAlias('@npm/bootstrap-icons/icons/github.svg'))
        ->render(),
    'https://github.com/yiisoft',
    [
        'class' => 'd-none d-sm-block d-md-block d-lg-block d-xl-block text-muted hover:text-dark text-decoration-none ms-3',
        'rel' => 'noopener',
        'title' => 'GitHub',
    ],
) ?>
<?= Html::a(
    Svg::widget()
        ->attributes(['height' => '24', 'width' => '24'])
        ->filePath(Yii::getAlias('@npm/bootstrap-icons/icons/slack.svg'))
        ->render(),
    'https://join.slack.com/t/yii/shared_invite/enQtMzQ4MDExMDcyNTk2LTc0NDQ2ZTZhNjkzZDgwYjE4YjZlNGQxZjFmZDBjZTU3NjViMDE4ZTMxNDRkZjVlNmM1ZTA1ODVmZGUwY2U3NDA',
    [
        'class' => 'd-none d-sm-block d-md-block d-lg-block d-xl-block text-muted hover:text-dark text-decoration-none ms-3',
        'rel' => 'noopener',
        'title' => 'Slack',
    ],
) ?>
<?= Html::a(
    Svg::widget()
        ->attributes(['height' => '24', 'width' => '24'])
        ->filePath(Yii::getAlias('@npm/bootstrap-icons/icons/facebook.svg'))
        ->render(),
    'https://www.facebook.com/groups/yiitalk/',
    [
        'class' => 'd-none d-sm-block d-md-block d-lg-block d-xl-block text-muted hover:text-dark text-decoration-none ms-3',
        'rel' => 'noopener',
        'title' => 'Facebook',
    ],
) ?>
<?= Html::a(
    Svg::widget()
        ->attributes(['height' => '24', 'width' => '24'])
        ->filePath(Yii::getAlias('@npm/bootstrap-icons/icons/twitter.svg'))
        ->render(),
    'https://twitter.com/yiiframework',
    [
        'class' => 'd-none d-sm-block d-md-block d-lg-block d-xl-block text-muted hover:text-dark text-decoration-none ms-3',
        'rel' => 'noopener',
        'title' => 'Twitter',
    ],
) ?>
<?= Html::a(
    Svg::widget()
        ->attributes(['height' => '24', 'width' => '24'])
        ->filePath(Yii::getAlias('@npm/bootstrap-icons/icons/telegram.svg'))
        ->render(),
    'https://t.me/yii_framework_in_english',
    [
        'class' => 'd-none d-sm-block d-md-block d-lg-block d-xl-block text-muted hover:text-dark text-decoration-none ms-3',
        'rel' => 'noopener',
        'title' => 'Telegram',
    ],
) ?>
