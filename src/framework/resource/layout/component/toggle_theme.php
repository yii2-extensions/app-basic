<?php

declare(strict_types=1);

use UIAwesome\Html\Graphic\Svg;
use yii\helpers\Html;

?>
<?= Html::button(
    Svg::widget()
        ->attributes(['height' => '24', 'width' => '24'])
        ->filePath(Yii::getAlias('@npm/bootstrap-icons/icons/moon-stars.svg'))
        ->id('theme-light-icon')
        ->render() .
    Svg::widget()
        ->attributes(['height' => '24', 'width' => '24'])
        ->filePath(Yii::getAlias('@npm/bootstrap-icons/icons/sun.svg'))
        ->id('theme-dark-icon')
        ->render(),
    [
        'class' => 'btn ms-2 me-2',
        'id' => 'theme-toggle',
        'type' => 'button',
        'title' => 'Switch light/dark mode',
    ],
) ?>
