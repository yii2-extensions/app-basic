<?php

declare(strict_types=1);

use App\Framework\Asset\ToggleThemeAsset;
use UIAwesome\Html\{
    Component\Bootstrap5\Toggle,
    Group\Div,
    Semantic\Footer,
    Textual\A,
    Textual\Span
};
use yii\web\View;

/**
 * @var View $this
 */
ToggleThemeAsset::register($this);
echo Div::widget()
    ->class('container mt-auto')
    ->content(
        Footer::widget()
            ->class('d-flex justify-content-between align-items-center py-3 my-4 border-top border-secondary-subtle')
            ->content(
                Div::widget()->class('col-md-4')
                    ->content(
                        A::widget()
                            ->ariaLabel('Yii Framework')
                            ->class('mb-3 mb-md-0 text-body-secondary text-decoration-none lh-1')
                            ->content(
                                Span::widget()
                                    ->class('mb-3 mb-md-0 text-body-secondary')
                                    ->content('&copy;', date('Y'), ' <strong>YiiFramework™.</strong>')
                            )
                            ->href('https://www.yiiframework.com/')
                            ->title('Yii Framework')
                    ),
                Div::widget()
                    ->class('col-md-4 justify-content-end d-flex align-items-center')
                    ->content(
                        $this->render('component/footer-icons'),
                        Toggle::Widget()->definition('selector-theme')->id('theme-toggle'),
                        $this->render('component/toggle_language')
                    )
            )
    );
