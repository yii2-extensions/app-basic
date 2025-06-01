<?php

declare(strict_types=1);

use app\framework\assets\ToggleThemeAsset;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 */
ToggleThemeAsset::register($this);
?>

<div class="container mt-auto">
    <footer class ="d-flex justify-content-between align-items-center py-3 my-4 border-top border-secondary-subtle">
        <div class="col-md-4">
            <?= Html::a(
                'Yii Framework' .
                Html::tag(
                    'span',
                    '&copy;' . date('Y') . ' <strong>YiiFramework™.</strong>',
                    [
                        'class' => 'mb-3 mb-md-0 text-body-secondary',
                    ],
                ),
                'https://www.yiiframework.com/',
                [
                    'aria-label' => 'Yii Framework',
                    'class' => 'mb-3 mb-md-0 text-body-secondary text-decoration-none lh-1',
                    'title' => 'Yii Framework',
                ],
            ) ?>
        </div>
        <div class="col-md-4 justify-content-end d-flex align-items-center">
            <?= $this->render('component/footer-icons') ?>
            <?= $this->render('component/toggle_theme') ?>
            <?= $this->render('component/toggle_language') ?>
        </div>
    </footer>
</div>
