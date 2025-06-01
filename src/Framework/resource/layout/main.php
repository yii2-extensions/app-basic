<?php

declare(strict_types=1);

use app\framework\assets\AppAsset;
use yii\{bootstrap5\Breadcrumbs, web\View};

/**
 * @var string $content
 * @var View $this
 */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" data-bs-theme="auto">
        <?= $this->render('head') ?>
        <body class="d-flex">
            <?php $this->beginBody() ?>
                <div class="cover-container d-flex w-100 h-100 mx-auto flex-column">
                    <header class="mb-auto">
                        <?= $this->render('component/menu') ?>
                        <?= $this->render('component/alert') ?>
                        <?= Breadcrumbs::widget(
                            [
                                'links' => $this->params['breadcrumbs'] ?? [],
                            ],
                        ) ?>
                    </header>
                    <?= $content ?>
                    <?= $this->render('footer') ?>
                </div>
            <?php $this->endBody() ?>
        </body>
    </html>
<?php $this->endPage();
