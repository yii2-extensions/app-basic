<?php

declare(strict_types=1);

use sjaakp\icon\Icon;
use yii\bootstrap5\Html;

?>
<?= Html::beginTag('div', ['class' => 'container']) ?>
    <?= Html::beginTag('footer', ['class' => 'd-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top']) ?>
        <?= Html::beginTag('div', ['class' => 'col-md-4']) ?>
            <?= Html::beginTag(
                'a',
                [
                    'class' => 'mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1',
                    'href' => 'https://www.yiiframework.com/',
                    'aria-label' => 'Yii Framework',
                ],
            ) ?>
                <?= Html::tag('span', '&copy; ' . date('Y') . ' <strong>YiiFramework</strong>', ['class' => 'mb-3 mb-md-0 text-body-secondary']) ?>
            <?= Html::endTag('a') ?>
        <?= Html::endTag('div') ?>
        <?= Html::beginTag('ul', ['class' => 'nav col-md-4 justify-content-end list-unstyled d-flex align-items-center']) ?>
            <?= Html::tag(
                'li',
                Html::a(
                    Icon::brands('twitter', ['class' => 'fa-solid fa-xl']),
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
                    Icon::brands('github', ['class' => 'fa-solid fa-xl']),
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
                    Icon::brands('telegram', ['class' => 'fa-solid fa-xl']),
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
            <li class="ms-1">
                <!-- Inicio Toggle modo dark -->
                <div class="dropdown bd-mode-toggle">
                <button class="btn btn-bd-primary dropdown-toggle d-flex align-items-center"
                        id="bd-theme"
                        type="button"
                        aria-expanded="false"
                        data-bs-toggle="dropdown"
                        aria-label="Toggle theme (auto)">
                    <?= Icon::solid('circle-half-stroke', ['class' => 'me-2 fa-solid fa-xl theme-icon-active']) ?>
                    <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
                    <li>
                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                        <?= Icon::solid('sun', ['class' => 'me-2 fa-solid theme-icon']) ?>
                        Light
                        <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
                    </button>
                    </li>
                    <li>
                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                        <?= Icon::solid('moon', ['class' => 'me-2 fa-solid theme-icon']) ?>
                        Dark
                        <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
                    </button>
                    </li>
                    <li>
                    <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                        <?= Icon::solid('circle-half-stroke', ['class' => 'me-2 fa-solid theme-icon']) ?>
                        Auto
                        <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
                    </button>
                    </li>
                </ul>
                </div>
                <!-- Fin Toggle modo dark -->
            </li>
        <?= Html::endTag('ul') ?>
    <?= Html::endTag('footer') ?>
<?= Html::endTag('div') ?>
