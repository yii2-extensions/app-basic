<?php

declare(strict_types=1);

use UIAwesome\Html\{Document\Head, Metadata\Meta, Metadata\Title};
use yii\{helpers\Html, web\View};

/**
 * @var View $this
 */
?>
<?= Head::widget()->begin() ?>
    <?= Meta::widget()->charset(Yii::$app->charset) ?>
    <?= Meta::widget()->content('width=device-width, initial-scale=1')->name('viewport') ?>
    <?= Html::csrfMetaTags() ?>
    <?= Title::widget()->content(Html::encode($this->title)) ?>
    <?php $this->head() ?>
<?= Head::end();
