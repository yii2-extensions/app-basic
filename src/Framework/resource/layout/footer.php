<?php

declare(strict_types=1);

use PHPForge\Html\A;
use PHPForge\Html\Div;
use PHPForge\Html\Layout\Footer;
use PHPForge\Html\Span;
use sjaakp\icon\Icon;
use yii\web\View;

/**
 * @var View $this
 */
$languages = Yii::$app->language;
$languageLabel = Yii::$app->params['app.languages.labels'][$languages] ?? null;
?>
<?= Div::widget()->class('container mt-auto')->begin() ?>
    <?= Footer::widget()
            ->class('d-flex justify-content-between align-items-center py-3 my-4 border-top border-secondary-subtle')
            ->begin()
    ?>
        <?= Div::widget()->class('col-md-4')->begin() ?>
            <?=
                A::widget()
                    ->ariaLabel('Yii Framework')
                    ->class('mb-3 mb-md-0 text-body-secondary text-decoration-none lh-1')
                    ->content(
                        Span::widget()
                            ->class('mb-3 mb-md-0 text-body-secondary')
                            ->content('&copy;', date('Y'), ' <strong>YiiFramework</strong>')
                    )
                    ->href('https://www.yiiframework.com/')
                    ->title('Yii Framework')
            ?>
        <?= Div::end() ?>
        <?= Div::widget()->class('col-md-4 justify-content-end d-flex align-items-center')->begin() ?>
            <?=
                A::widget()
                    ->class('d-none d-sm-block d-md-block d-lg-block d-xl-block text-body-secondary ms-3')
                    ->content(Icon::renderIcon('brands', 'twitter', ['class' => 'fa-solid fa-xl']))
                    ->href('https://x.com/Terabytesoftw')
                    ->rel('noopener')
                    ->target('_blank')
                    ->title('Terabytesoftw on en X')
            ?>
            <?=
                A::widget()
                    ->class('d-none d-sm-block d-md-block d-lg-block d-xl-block text-body-secondary ms-3')
                    ->content(Icon::renderIcon('brands', 'github', ['class' => 'fa-solid fa-xl']))
                    ->href('https://github.com/yiisoft/yii2/tree/2.2')
                    ->rel('noopener')
                    ->target('_blank')
                    ->title('Yii Framework v.2.2 on GitHub')
            ?>
            <?=
                A::widget()
                    ->class('d-none d-sm-block d-md-block d-lg-block d-xl-block text-body-secondary ms-3')
                    ->content(Icon::renderIcon('brands', 'telegram', ['class' => 'fa-solid fa-xl']))
                    ->href('https://t.me/yii_framework_in_english')
                    ->rel('noopener')
                    ->target('_blank')
                    ->title('Yii Framework emglish on Telegram')
            ?>
            <?= $this->render('component/toggle_theme') ?>
            <?php if ($languageLabel !== null) : ?>
                <?= $this->render('component/toggle_language', ['languageLabel' => $languageLabel]) ?>
            <?php endif ?>
        <?= Div::end() ?>
    <?= Footer::end() ?>
<?= Div::end();
