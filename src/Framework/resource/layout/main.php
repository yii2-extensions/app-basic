<?php

declare(strict_types=1);

use App\Framework\Asset\AppAsset;
use sjaakp\icon\Icon;
use UIAwesome\Html\{Document\Body, Document\Html, Group\Div, Semantic\Header};
use yii\{bootstrap5\Breadcrumbs, web\View};

/**
 * @var string $content
 * @var View $this
 */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <?= Html::widget()->attributes(['lang' => Yii::$app->language, 'data-bs-theme' => 'auto'])->begin() ?>
        <?= $this->render('head') ?>
        <?php $this->beginBody() ?>
            <?= Body::widget()->class('d-flex')->begin() ?>
                <?= Div::widget()->class('cover-container d-flex w-100 h-100 mx-auto flex-column')->begin() ?>
                    <?= Header::widget()->class('mb-auto')->begin() ?>
                        <?= $this->render('component/menu') ?>
                        <?= $this->render('component/alert') ?>
                        <?= Breadcrumbs::widget(
                            [
                                'links' => $this->params['breadcrumbs'] ?? [],
                            ]
                        ) ?>
                    <?= Header::end() ?>
                    <?= $content ?>
                    <?= $this->render('footer') ?>
                <?= Div::end() ?>
                <?= Icon::symbols($this) ?>
            <?= Body::end() ?>
        <?php $this->endBody() ?>
    <?= Html::end() ?>
<?php $this->endPage();
