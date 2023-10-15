<?php

declare(strict_types=1);

use sjaakp\icon\Icon;
use yii\bootstrap5\Html;
use yii\web\View;

/**
 * @var View $this
 */
?>
<?= Html::beginTag('div', ['class' => 'container mt-auto']) ?>
    <?= Html::beginTag(
        'footer',
        [
            'class' => 'd-flex justify-content-between align-items-center py-3 my-4 border-top border-secondary-subtle',
        ],
    ) ?>
        <?= Html::beginTag('div', ['class' => 'col-md-4']) ?>
            <?= Html::beginTag(
                'a',
                [
                    'class' => 'mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1',
                    'href' => 'https://www.yiiframework.com/',
                    'aria-label' => 'Yii Framework',
                ],
            ) ?>
                <?= Html::tag(
                    'span',
                    '&copy; ' . date('Y') . ' <strong>YiiFramework</strong>',
                    ['class' => 'mb-3 mb-md-0 text-body-secondary'],
                ) ?>
            <?= Html::endTag('a') ?>
        <?= Html::endTag('div') ?>
        <?= Html::beginTag(
            'ul',
            ['class' => 'nav col-md-4 justify-content-end list-unstyled d-flex align-items-center'],
        ) ?>
            <?= Html::tag(
                'li',
                Html::a(
                    Icon::renderIcon('brands', 'twitter', ['class' => 'fa-solid fa-xl']),
                    'https://x.com/Terabytesoftw',
                    [
                        'class' => 'text-body-secondary',
                        'rel' => 'noopener',
                        'target' => '_blank',
                        'title' => 'Terabytesoftw on en X',
                    ]
                ),
                ['class' => 'ms-3'],
            ) ?>
            <?= Html::tag(
                'li',
                Html::a(
                    Icon::renderIcon('brands', 'github', ['class' => 'fa-solid fa-xl']),
                    'https://github.com/yiisoft/yii2/tree/2.2',
                    [
                        'class' => 'text-body-secondary',
                        'rel' => 'noopener',
                        'target' => '_blank',
                        'title' => 'Yii Framework v.2.2 on GitHub',
                    ]
                ),
                ['class' => 'ms-3'],
            ) ?>
            <?= Html::tag(
                'li',
                Html::a(
                    Icon::renderIcon('brands', 'telegram', ['class' => 'fa-solid fa-xl']),
                    'https://t.me/yii_framework_in_english',
                    [
                        'class' => 'text-body-secondary',
                        'rel' => 'noopener',
                        'target' => '_blank',
                        'title' => 'Yii Framework v.2.2 on Telegram',
                    ]
                ),
                ['class' => 'ms-3'],
            ) ?>
            <?= $this->render('component/toggle_dark') ?>
        <?= Html::endTag('ul') ?>
    <?= Html::endTag('footer') ?>
<?= Html::endTag('div') ?>
