<?php

declare(strict_types=1);

/**
 * @var yii\web\View $this
 */
use yii\bootstrap5\Breadcrumbs;
?>
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <?= Breadcrumbs::widget(
                [
                    'activeItemTemplate' => '<li class="breadcrumb-item active fw-semibold">{link}</li>',
                    'links' => $this->params['breadcrumbs'] ?? [],
                    'itemTemplate' => '<li class="breadcrumb-item">{link}</li>',
                    'options' => [
                        'class' => 'breadcrumb bg-body-tertiary rounded-3 px-3 py-2 mb-0 border',
                    ],
                ],
            ) ?>
        </div>
    </div>
</div>
