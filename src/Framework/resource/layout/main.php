<?php

declare(strict_types=1);

use App\Framework\Asset\AppAsset;
use sjaakp\icon\Icon;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\web\View;

/**
 * @var string $content
 * @var View $this
 */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <?= Html::beginTag('html', ['lang' => Yii::$app->language, 'data-bs-theme' => 'auto']) ?>
        <?= $this->render('head') ?>
        <?php $this->beginBody() ?>
            <?= Html::beginTag('body', ['class' => 'd-flex']) ?>
                <?= Html::beginTag('div', ['class' => 'cover-container d-flex w-100 h-100 mx-auto flex-column']) ?>
                    <?= Html::beginTag('header', ['class' => 'mb-auto']) ?>
                        <?= $this->render('component/menu') ?>
                        <?= $this->render('component/alert') ?>
                        <?= Breadcrumbs::widget(
                            [
                                'links' => $this->params['breadcrumbs'] ?? [],
                            ]
                        ) ?>
                    <?= Html::endTag('header') ?>
                    <?= Html::tag('main', $content) ?>
                    <?= $this->render('footer') ?>
                <?= Html::endTag('div') ?>
                <?= Icon::symbols($this) ?>
            <?= Html::endTag('body') ?>
        <?php $this->endBody() ?>
    <?= Html::endTag('html') ?>
<?php $this->endPage();
