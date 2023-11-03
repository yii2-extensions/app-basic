<?php

declare(strict_types=1);

use PHPForge\Html\Head;
use PHPForge\Html\Meta;
use PHPForge\Html\Title;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 */
?>
<?= Head::widget()->begin() ?>
    <?= Meta::widget()->charset(Yii::$app->charset) ?>
    <?= Meta::widget()->content('viewport', 'width=device-width, initial-scale=1') ?>
    <?= Html::csrfMetaTags() ?>
    <?= Title::widget()->content(Html::encode($this->title)) ?>
    <?php $this->head() ?>
<?= Head::end();
