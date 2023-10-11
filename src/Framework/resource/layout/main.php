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
        <?= Html::beginTag('body') ?>
            <?php $this->beginBody() ?>
                <?= Html::beginTag('wrapper', ['class' => 'd-flex flex-column']) ?>
                    <?= $this->render('component/menu') ?>
                    <?= Html::beginTag(
                        'div',
                        ['class' => 'd-flex flex-fill align-items-center justify-content-center'])
                    ?>
                        <?= Breadcrumbs::widget(
                            [
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            ]
                        ) ?>
                        <?= $content ?>
                    <?= Html::endTag('div') ?>
                    <?= $this->render('footer') ?>
                <?= Html::endTag('wrapper') ?>
                <?= Icon::symbols($this) ?>
            <?php $this->endBody() ?>
        <?= Html::endTag('body') ?>
    <?= Html::endTag('html') ?>
<?php $this->endPage();
