<?php

/**
 * about.
 *
 * View web application basic
 **/
use yii\bootstrap4\Html;

$this->title = Yii::t('AppBasic', 'About');

?>

<?= Html::beginTag('div', ['class' => 'site-about']) ?>

    <?= Html::tag('h1', '<b>'.Html::encode($this->title).'</b>', ['class' => 'c-grey-900 mb-40 display-4']) ?>
    <?= Html::tag('p', Yii::t('AppBasic', 'This is the About page. You may modify the following file to customize '.
        'its content.')) ?>

    <code><?= __FILE__ ?></code>

<?= Html::endTag('div') ?>
