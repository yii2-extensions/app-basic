<?php

declare(strict_types=1);

use yii\helpers\Html;
use yii\web\View;

/** @var View $this */
$this->title = Yii::t('app.basic', 'Home');
?>
<div class="jumbotron jumbotron-fluid text-center">
    <h1 class="display-2 fw-bold"><?= Yii::t('app.basic', 'Web Application') ?></h1>
    <?= Html::a(
        Yii::t('app.basic', 'Get Started'),
        'https://www.yiiframework.com/doc/',
        [
            'class' => 'btn btn-primary mt-3',
        ],
    ) ?>
</div>
