<?php
/**
 * index.
 *
 * View web application basic
 **/

use yii\bootstrap4\Html;

$this->title = \Yii::t('AppBasic', 'Index');

?>

<?= Html::beginTag('div', ['class' => 'site-index']) ?>

    <?= Html::beginTag('div', ['class' => 'jumbotron']) ?>

        <?= Html::tag('h1', \Yii::t('AppBasic', 'Congratulations'), ['class' => 'c-grey-900 mb-40']) ?>

        <?= Html::beginTag('p', ['class' => 'lead']) ?>
            <?= \Yii::t('AppBasic', 'You have successfully created your Yii-powered application') ?>
        <?= Html::endTag('p') ?>

        <?= Html::beginTag('p') ?>
            <?= Html::beginTag('a', ['class' => 'btn btn-lg btn-success', 'href' => 'http://www.yiiframework.com']) ?>
                <?= \Yii::t('AppBasic', 'Get started with Yii') ?>
            <?= Html::endTag('a') ?>
        <?= Html::endTag('p') ?>

    <?= Html::endTag('div') ?>

    <?= Html::beginTag('div', ['class' => 'body-content']) ?>

        <?= Html::beginTag('div', ['class' => 'row']) ?>

            <?= Html::beginTag('div', ['class' => 'col-lg-4']) ?>

                <?= Html::tag('h2', 'Heading') ?>

                <?= Html::beginTag('p') ?>
                    Lorem  ipsum  dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt 
                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat. Duis  aute  irure dolor in reprehenderit in
                    voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                <?= Html::endTag('p') ?>

                <?= Html::beginTag('p') ?>
                    <?= Html::beginTag('a', ['class' => 'btn btn-default', 'href' => 'http://www.yiiframework.com/doc/']) ?>
                        <?= \Yii::t('AppBasic', 'Yii Documentation').' &raquo;' ?>
                    <?= Html::endTag('a') ?>
                <?= Html::endTag('p') ?>

            <?= Html::endTag('div') ?>

            <?= Html::beginTag('div', ['class' => 'col-lg-4']) ?>

                <?= Html::tag('h2', 'Heading') ?>

                <?= Html::beginTag('p') ?>
                    Lorem  ipsum  dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt 
                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat. Duis  aute  irure dolor in reprehenderit in
                    voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                <?= Html::endTag('p') ?>

                <?= Html::beginTag('p') ?>
                    <?= Html::beginTag('a', ['class' => 'btn btn-default', 'href' => 'http://www.yiiframework.com/forum/']) ?>
                        <?= \Yii::t('AppBasic', 'Yii Forum').' &raquo;' ?>
                    <?= Html::endTag('a') ?>
                <?= Html::endTag('p') ?>

            <?= Html::endTag('div') ?>

            <?= Html::beginTag('div', ['class' => 'col-lg-4']) ?>

                <?= Html::tag('h2', 'Heading') ?>

                <?= Html::beginTag('p') ?>
                    Lorem  ipsum  dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt 
                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat. Duis  aute  irure dolor in reprehenderit in
                    voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                <?= Html::endTag('p') ?>

                <?= Html::beginTag('p') ?>
                    <?= Html::beginTag('a', ['class' => 'btn btn-default', 'href' => 'http://www.yiiframework.com/extensions/']) ?>
                        <?= \Yii::t('AppBasic', 'Yii Extensions').' &raquo;' ?>
                    <?= Html::endTag('a') ?>
                <?= Html::endTag('p') ?>

            <?= Html::endTag('div') ?>

        <?= Html::endTag('div') ?>

    <?= Html::endTag('div') ?>

<?= Html::endTag('div') ?>
