<?php

declare(strict_types=1);

use UIAwesome\Html\Svg\Svg;
use yii\helpers\Html;

?>
<?= Html::button(
    Svg::tag()
        ->filePath(Yii::getAlias('@npm/bootstrap-icons/icons/moon-stars.svg'))
        ->height(24)
        ->id('theme-light-icon')
        ->width(24)
        ->render() .
    Svg::tag()
        ->filePath(Yii::getAlias('@npm/bootstrap-icons/icons/sun.svg'))
        ->height(24)
        ->id('theme-dark-icon')
        ->width(24)
        ->render(),
    [
        'class' => 'btn ms-2 me-2',
        'id' => 'theme-toggle',
        'type' => 'button',
        'title' => 'Switch light/dark mode',
    ],
) ?>
