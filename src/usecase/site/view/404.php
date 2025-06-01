<?php

declare(strict_types=1);

use yii\helpers\Html;
use yii\web\View;

/**
 * @var string $name
 * @var View $this
 */
$this->title = $name;
?>
<div class="d-flex flex-column align-items-center justify-center">
    <div class="text-center">
        <?= Html::img(
            'https://raw.githubusercontent.com/yii-tools/.github/61bbcb1b1f777740cce4200f95ae4bc0aa4350a8/images/app/404.svg',
            [
                'alt' => '404',
                'class' => 'img-fluid',
            ],
        ) ?>
    </div>
    <div class="text-center">
        <h1 class="mb-3"><?= Html::encode($this->title) ?></h1>
        <h6><?= Html::encode(Yii::t('app.basic', 'Oops! Looks like you followed a bad link.')) ?></h6>
        <h6><?= Html::encode(Yii::t('app.basic', 'If you think this is a problem with us, please tell us.')) ?></h6>
    </div>
</div>
