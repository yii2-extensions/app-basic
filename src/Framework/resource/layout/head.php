<?php

declare(strict_types=1);

use yii\bootstrap5\Html;
use yii\web\View;

/**
 * @var View $this
 */
?>
<?= Html::beginTag('head') ?>
    <?= Html::tag('meta', '', ['charset' => Yii::$app->charset]) ?>
    <?= Html::tag('meta', '', ['http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge']) ?>
    <?= Html::tag('meta', '', ['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']) ?>
    <?= Html::csrfMetaTags() ?>
    <?= Html::tag('title', Html::encode($this->title)) ?>
    <?php $this->head() ?>
<?= Html::endTag('head') ?>
