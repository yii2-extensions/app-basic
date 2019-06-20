<?php
/**
 * error.
 *
 * View web application basic
 **/
use yii\bootstrap4\Html;

$this->title = $name;

?>

<?= Html::beginTag('div', ['class' => 'site-error']) ?>

    <?= Html::tag('h1', Html::encode($this->title), ['class' => 'c-grey-900 mb-40']) ?>

    <?= Html::beginTag('div', ['class' => 'alert alert-danger']) ?>
        <?= nl2br(Html::encode($message)) ?>
    <?= Html::endTag('div') ?>

    <?= Html::beginTag('p') ?>
        <?= \Yii::t('AppBasic', 'The above error occurred while the Web server was processing your request') ?>
    <?= Html::endTag('p') ?>

    <?= Html::beginTag('p') ?>
        <?= \Yii::t('AppBasic', 'Please contact us if you think this is a server error. Thank you') ?>
    <?= Html::endTag('p') ?>

<?php echo Html::endTag('div');
