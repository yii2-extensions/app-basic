<?php

declare(strict_types=1);

use yii\helpers\Html;
use yii\web\View;

/** @var View $this */
$this->title = Yii::t('app.basic', 'About');
?>
<div class="text-center">
    <h1 class="mb-40 display-4 fw-bold"><?= Html::encode($this->title) ?></h1>
    <p><?= Yii::t('app.basic', 'This is the About page. You may modify the following file to customize its content.') ?></p>
    <code><?= __FILE__ ?></code>
</div>
