<?php

declare(strict_types=1);

use App\Framework\Asset\ToggleThemeAsset;
use sjaakp\icon\Icon;
use yii\bootstrap5\Html;
use yii\web\View;

/**
 * @var View $this
 */
ToggleThemeAsset::register($this);
?>
<?= Html::beginTag('li') ?>
    <?= Html::beginTag('div', ['class' => 'dropdown bd-mode-toggle']) ?>
        <?= Html::beginTag(
            'button',
            [
                'aria-expanded' => 'false',
                'aria-label' => 'Toggle theme (auto)',
                'class' => 'btn btn-bd-primary dropdown-toggle d-flex align-items-center',
                'data-bs-toggle' => 'dropdown',
                'id' => 'toggle-theme',
                'type' => 'button'
            ],
        ) ?>
            <?= Icon::renderIcon(
                'solid',
                'circle-half-stroke', ['class' => 'me-2 fa-solid fa-xl theme-icon-active text-secondary-emphasis'],
            ) ?>
            <?= Html::tag('span', 'Toggle theme', ['class' => 'visually-hidden', 'id' => 'toggle-theme-text']) ?>
        <?= Html::endTag('button') ?>
        <?= Html::beginTag(
            'ul',
            ['aria-labelledby' => 'toggle-theme-text', 'class' => 'dropdown-menu dropdown-menu-end shadow'],
        ) ?>
            <?= Html::beginTag('li') ?>
                <?= Html::beginTag(
                    'button',
                    [
                        'aria-pressed' => 'false',
                        'class' => 'dropdown-item d-flex align-items-center',
                        'data-bs-theme-value' => 'light',
                    ],
                ) ?>
                    <?= Icon::renderIcon('solid', 'sun', ['class' => 'me-2 fa-solid theme-icon']) ?>
                    Light
                    <?= Icon::renderIcon(
                        'solid',
                        'check',
                        ['class' => 'check ms-auto d-none', 'width' => '1em', 'height' => '1em'],
                    ) ?>
                <?= Html::endTag('button') ?>
            <?= Html::endTag('li') ?>
            <?= Html::beginTag('li') ?>
                <?= Html::beginTag(
                    'button',
                    [
                        'aria-pressed' => 'false',
                        'class' => 'dropdown-item d-flex align-items-center',
                        'data-bs-theme-value' => 'dark',
                    ],
                ) ?>
                    <?= Icon::renderIcon('solid', 'moon', ['class' => 'me-2 fa-solid theme-icon']) ?>
                    Dark
                    <?= Icon::renderIcon(
                        'solid',
                        'check',
                        ['class' => 'check ms-auto d-none', 'width' => '1em', 'height' => '1em'],
                    ) ?>
                <?= Html::endTag('button') ?>
            <?= Html::endTag('li') ?>
            <?= Html::beginTag('li') ?>
                <?= Html::beginTag(
                    'button',
                    [
                        'aria-pressed' => 'false',
                        'class' => 'dropdown-item d-flex align-items-center',
                        'data-bs-theme-value' => 'auto',
                    ],
                ) ?>
                    <?= Icon::renderIcon('solid', 'circle-half-stroke', ['class' => 'me-2 fa-solid theme-icon']) ?>
                    Auto
                    <?= Icon::renderIcon(
                        'solid',
                        'check',
                        ['class' => 'check ms-auto d-none', 'width' => '1em', 'height' => '1em'],
                    ) ?>
                <?= Html::endTag('button') ?>
            <?= Html::endTag('li') ?>
        <?= Html::endTag('ul') ?>
    <?= Html::endTag('div') ?>
<?= Html::endTag('li');
