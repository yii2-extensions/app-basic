<?php

declare(strict_types=1);

use yii\bootstrap5\Html;
use yii\web\View;

/**
 * @var View $this
 */
$this->title = \Yii::t('app.basic', 'Index');
?>
<?= Html::beginTag('div', ['class' => 'jumbotron jumbotron-fluid text-center']) ?>
    <?= Html::beginTag('h1', ['class' => 'display-2']) ?>
        <b>Web Application</b>
    <?= Html::endTag('h1') ?>
    <?= Html::beginTag('p', ['class' => 'lead']) ?>
        <b>Yii v.2.2</b>
    <?= Html::endTag('p') ?>
<?= Html::endTag('div') ?>
