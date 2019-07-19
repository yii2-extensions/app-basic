<?php

/**
 * main.
 *
 * Layout web application basic
 **/

use terabytesoft\widgets\Alert;
use terabytesoft\app\basic\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;

AppAsset::register($this);

$menuItems = \Yii::$app->params['app.basic.menu.isguest'];

if (isset(\Yii::$app->extensions['terabytesoftw/app-user']) || (YII_ENV === 'test')) {
    switch (\Yii::$app->user->isGuest) {
        case true:
            $menuItems = array_merge($menuItems, \Yii::$app->params['app.basic.setting.menu.user.isguest']);
            break;
        case false:
            $menuItems = \Yii::$app->params['app.basic.setting.menu.user.logged'];
            break;
    }
}
?>

<?php $this->beginPage() ?>

    <!DOCTYPE html>
    <?= Html::beginTag('html', ['lang' => \Yii::$app->language]) ?>

        <?= Html::beginTag('head') ?>
            <?= Html::tag('meta', '', ['charset' => \Yii::$app->charset]) ?>
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
                        'brandLabel' => \Yii::t('app.basic', \Yii::$app->name),
                        'brandUrl'   => \Yii::$app->homeUrl,
                        'options'    => [
                            'class' => 'navbar navbar-dark bg-dark navbar-expand-lg',
                        ],
                    ]);

                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav float-right ml-auto'],
                        'items'   => $menuItems,
                    ]);

                    NavBar::end(); ?>

                    <?= Alert::widget() ?>

                    <?= Html::beginTag(
                        'div',
                        [
                            'class' => in_array(
                                $this->context->action->uniqueId,
                                [
                                    'site/index',
                                    'site/about'
                                ]
                            )
                            ? 'd-flex flex-fill align-items-center justify-content-center'
                            : 'container flex-fill'
                        ]
                    ) ?>

                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>

                        <?= $content ?>

                    <?= Html::endTag('div') ?>

                    <?= Html::beginTag('footer', ['class' => 'footer']) ?>

                        <?= Html::beginTag('div', ['class' => 'container flex-fill']) ?>

                            <?= Html::beginTag('p', ['class' => 'float-left']) ?>
                                <?= \Yii::$app->params['app.basic.footer.autor']?>
                            <?= Html::endTag('p') ?>

                            <?= Html::beginTag('p', ['class' => 'float-right']) ?>
                                <?= \Yii::t('app.basic', 'Powered by') ?>
                                <?= Html::a(
                                    \Yii::t(
                                        'app.basic',
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
