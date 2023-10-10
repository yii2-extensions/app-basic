<?php

declare(strict_types=1);

use App\Framework\Asset\AppAsset;
use sjaakp\icon\Icon;
use sjaakp\icon\IconAsset;
use terabytesoft\widgets\Alert;
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
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check2" viewBox="0 0 16 16">
                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                </symbol>
                </svg>
                <?= Html::beginTag('wrapper', ['class' => 'd-flex flex-column']) ?>
                    <?= $this->render('component/menu') ?>
                    <?= Html::beginTag(
                        'div',
                        [
                            'class' => in_array(
                                $this->context->action->uniqueId,
                                [
                                    'site/index',
                                    'about/index'
                                ]
                            )
                            ? 'd-flex flex-fill align-items-center justify-content-center'
                            : 'container flex-fill'
                        ]
                    ) ?>
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
