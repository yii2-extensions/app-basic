<?php

declare(strict_types=1);

use yii\bootstrap5\Html;
use yii\web\View;

/**
 * @var string $message
 * @var string $name
 * @var View $this
 */
$this->title = Html::encode($name);
?>
<?= Html::beginTag('div', ['class' => 'd-flex flex-column align-items-center justify-center']) ?>
    <?= Html::beginTag('div', ['class' => 'text-center mb-3']) ?>
        <?= Html::img(
            'https://raw.githubusercontent.com/yii-tools/.github/61bbcb1b1f777740cce4200f95ae4bc0aa4350a8/images/app/404.svg',
            [
                'class' => 'img-fluid mb-4',
                'alt' => '404',
            ],
        ) ?>
    <?= Html::endTag('div') ?>
    <?= Html::beginTag('div', ['class' => 'text-center mb-3']) ?>
        <?= Html::tag('h1', \Yii::t('app.basic', $this->title), ['class' => 'mb-4']) ?>
        <?= Html::tag('h6', \Yii::t('app.basic', 'Oops! Looks like you followed a bad link.')) ?>
        <?= Html::tag('h6', \Yii::t('app.basic', 'If you think this is a problem with us, please tell us.')) ?>
    <?= Html::endTag('div') ?>
<?= Html::endTag('div');
