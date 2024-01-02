<?php

declare(strict_types=1);

use App\Framework\Asset\ToggleThemeAsset;
use PHPForge\Component\Dropdown;
use PHPForge\Component\Item;
use PHPForge\Html\ButtonToggle;
use sjaakp\icon\Icon;
use yii\web\View;

/**
 * @var View $this
 */
ToggleThemeAsset::register($this);

echo Dropdown::widget()
    ->container(true)
    ->containerClass('btn-group dropup bd-mode-toggle ms-3')
    ->items(
        Item::create()
            ->content(
                Icon::renderIcon('solid', 'sun', ['class' => 'me-2 fa-solid theme-icon']),
                'Light',
                Icon::renderIcon(
                    'solid',
                    'check',
                    ['class' => 'check ms-auto d-none', 'width' => '1em', 'height' => '1em'],
                ),
            )
            ->link('#')
            ->linkAttributes(['aria-pressed' => 'false', 'data-bs-theme-value' => 'light'])
            ->linkClass('dropdown-item d-flex align-items-center'),
        Item::create()
            ->content(
                Icon::renderIcon('solid', 'moon', ['class' => 'me-2 fa-solid theme-icon']),
                'Dark',
                Icon::renderIcon(
                    'solid',
                    'check',
                    ['class' => 'check ms-auto d-none', 'width' => '1em', 'height' => '1em'],
                ),
            )
            ->link('#')
            ->linkAttributes(['aria-pressed' => 'false', 'data-bs-theme-value' => 'dark'])
            ->linkClass('dropdown-item d-flex align-items-center'),
        Item::create()
            ->content(
                Icon::renderIcon('solid', 'circle-half-stroke', ['class' => 'me-2 fa-solid theme-icon']),
                'Auto',
                Icon::renderIcon(
                    'solid',
                    'check',
                    ['class' => 'check ms-auto d-none', 'width' => '1em', 'height' => '1em'],
                ),
            )
            ->link('#')
            ->linkAttributes(['aria-pressed' => 'false', 'data-bs-theme-value' => 'auto'])
            ->linkClass('dropdown-item d-flex align-items-center'),
    )
    ->listClass('dropdown-menu dropdown-menu-end shadow')
    ->toggleButton(
        ButtonToggle::widget()
            ->ariaExpanded('false')
            ->ariaLabel('Toggle theme (auto)')
            ->class('btn btn-bd-primary dropdown-toggle d-flex align-items-center')
            ->dataBsToggle('dropdown')
            ->id('toggle-theme')
            ->toggleClass('visually-hidden')
            ->toggleContent('Toggle theme')
            ->toggleId('toggle-theme-text')
            ->togglePrefix(
                Icon::renderIcon(
                    'solid',
                    'circle-half-stroke',
                    ['class' => 'me-2 fa-solid fa-xl theme-icon-active text-secondary-emphasis'],
                ),
            )
    );
