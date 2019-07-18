<?php

/**
 * index.
 *
 * View web application basic
 **/

use yii\bootstrap4\Html;

$this->title = \Yii::t('app.basic', 'Index');

?>

<?= Html::beginTag('div', ['class' => 'jumbotron jumbotron-fluid text-center']) ?>
    <?= Html::beginTag('h1', ['class' => 'display-2']) ?>
        <b>Web Application</b>
    <?= Html::endTag('h1') ?>
    <?= Html::beginTag('p', ['class' => 'lead']) ?>
        <b>Basic Yii.2.0.</b>
    <?= Html::endTag('p') ?>
<?= Html::endTag('div') ?>
