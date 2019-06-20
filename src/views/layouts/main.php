<?php
/**
 * main.
 *
 * Layout web application basic
 **/

use terabytesoft\app\basic\assets\AppAsset;
//use TerabyteSoft\Widgets\Alert;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;

AppAsset::register($this);

if ($this->context->module->user->isGuest) {
    $menuItems = $this->context->module->params['app.basic.menu.isguest'];
} else {
    $menuItems = $this->context->module->params['app.basic.menu.logged'];
}

?>

<?php $this->beginPage() ?>

    <!DOCTYPE html>
    <?= Html::beginTag('html', ['lang' => $this->context->module->language]) ?>

        <?= Html::beginTag('head') ?>
            <?= Html::tag('meta', '', []) ?>
            <?= Html::tag('meta', '', ['http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge']) ?>
            <?= Html::tag('meta', '', ['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']) ?>
            <?= Html::csrfMetaTags() ?>
            <?= Html::tag('title', Html::encode($this->title)) ?>
            <?php $this->head() ?>
        <?= Html::endTag('head') ?>

        <?php $this->beginBody() ?>

            <?= Html::beginTag('body') ?>

                <?= Html::beginTag('wrapper', ['class' => 'd-flex flex-column']) ?>

                    <?php NavBar::begin([
                        'brandLabel' => \Yii::t('AppBasic', $this->context->module->name),
                        'brandUrl'   => $this->context->module->homeUrl,
                        'options'    => [
                            'class' => 'navbar  navbar-dark bg-dark navbar-expand-lg',
                        ],
                    ]);

                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav float-right ml-auto'],
                        'items'   => $menuItems,
                    ]);

                    NavBar::end(); ?>

                    <?= Html::beginTag('div', ['class' => 'container flex-fill']) ?>

                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>

                        <?= $content ?>

                    <?= Html::endTag('div') ?>

                    <?= Html::beginTag('footer', ['class' => 'footer']) ?>

                        <?= Html::beginTag('div', ['class' => 'container flex-fill']) ?>

                            <?= Html::beginTag('p', ['class' => 'float-left']) ?>
                                <?= $this->context->module->params['app.basic.autor']?>
                            <?= Html::endTag('p') ?>

                            <?= Html::beginTag('p', ['class' => 'float-right']) ?>
                                <?= \Yii::t('AppBasic', 'Powered by') ?>
                                <?= Html::a(
                                    \Yii::t(
                                        'AppBasic',
                                        'Yii Framework'
                                    ),
                                    'http://www.yiiframework.com/',
                                    ['rel' => 'external']
                                ) ?>
                            <?= Html::endTag('p') ?>

                        <?= Html::endTag('div') ?>

                    <?= Html::endTag('footer') ?>

                <?= Html::endTag('wrapper') ?>

            <?= Html::endTag('body') ?>

        <?php $this->endBody() ?>

    <?= Html::endTag('html') ?>

<?php $this->endPage() ?>
