<?php

declare(strict_types=1);

use PHPForge\Html\Div;
use PHPForge\Html\H;
use PHPForge\Html\Helper\Encode;
use PHPForge\Html\P;
use yii\web\View;

/**
 * @var View $this
 */
$this->title = Yii::t('app.basic', 'About');
?>
<?= Div::widget()->class('text-center')->begin() ?>
    <?= H::widget()
            ->content('<b>' . Encode::create()->content($this->title) . '</b>')
            ->class('c-grey-900 mb-40 display-4')
            ->tagName('h1')
    ?>
    <?= P::widget()
            ->content(
                Yii::t(
                    'app.basic',
                    'This is the About page. You may modify the following file to customize its content.'
                )
            )
    ?>
    <code><?= __FILE__ ?></code>
<?= Div::end();
