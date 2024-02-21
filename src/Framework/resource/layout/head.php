<?php

declare(strict_types=1);

use PHPForge\Html\Document\Head;
use PHPForge\Html\Metadata\Meta;
use PHPForge\Html\Metadata\Title;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 */
?>
<?= Head::widget()->begin() ?>
    <?= Meta::widget()->charset(Yii::$app->charset) ?>
    <?= Meta::widget()->content('width=device-width, initial-scale=1')->name('viewport') ?>
    <?= Html::csrfMetaTags() ?>
    <?= Title::widget()->content(Html::encode($this->title)) ?>
    <?php $this->head() ?>
<?= Head::end();
