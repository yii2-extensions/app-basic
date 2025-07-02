<?php

declare(strict_types=1);

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 */
$this->title = Yii::t('app.basic', 'About');
$this->params['breadcrumbs'] = [$this->title];
?>
<div class="text-center">
    <h1 class="mb-40 display-4 fw-bold"><?= Html::encode($this->title) ?></h1>
    <p><?= Yii::t('app.basic', 'This is the About page. You may modify the following file to customize its content.') ?></p>
    <code><?= __FILE__ ?></code>
</div>
