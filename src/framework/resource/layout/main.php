<?php

declare(strict_types=1);

use app\framework\asset\AppAsset;

/**
 * @var string $content
 * @var yii\web\View $this
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
                        <?= $this->render('component/breadcrumbs') ?>
                    </header>
                    <?= $content ?>
                    <?= $this->render('footer') ?>
                </div>
            <?php $this->endBody() ?>
        </body>
    </html>
<?php $this->endPage();
