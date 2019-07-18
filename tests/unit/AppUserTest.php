<?php

namespace terabytesoft\app\basic\tests;

use terabytesoft\app\basic\controllers\SiteController;
use terabytesoft\app\basic\tests\_data\stubs\UserIdentity;
use yii\helpers\ArrayHelper;
use yii\web\View;

class AppUserTest extends \Codeception\Test\Unit
{
    /**
     * @var \yii\base\Controller $controller
     */
    protected $controller;

    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var \yii\base\View $view
     */
    protected $view;

    /**
     *  _before
     */
    protected function _before(): void
    {
        $params = require_once \hiqdev\composer\config\Builder::path('params');
        $appConfig = [
            'components' => [
                'assetManager' => [
                    'basePath' => \Yii::$app->params['app.basic.assetmanager.base.path'],
                ],
                'i18n' => [
                    'translations' => [
                        'app.basic' => [
                            'class' => \yii\i18n\PhpMessageSource::class,
                        ],
                    ],
                ],
                'request' => [
                    'cookieValidationKey' => $params['app.basic.request.cookievalidationkey'],
                    'enableCsrfValidation' => $params['app.basic.request.enablecsrfvalidation'],
                    'scriptFile' => dirname(__DIR__, 1) . '/public/index.php',
                    'scriptUrl' => '/baseUrl/index.php',

                ],
                'user' => [
                    'identityClass' => UserIdentity::className(),
                ],
            ],
            'params' => $params
        ];
        $this->mockWebApplication($appConfig);
        $this->controller = new SiteController('site', \Yii::$app, []);
        $this->view = new View();
    }

    /**
     * _after
     */
    protected function _after(): void
    {
        unset($this->controller);
        unset($this->tester);
        unset($this->view);
        $this->destroyApplication();
    }

    /**
     * testMenuAppUser
     */
    public function testMenuAppUser(): void
    {
        // run actionIndex
        $viewRender = $this->controller->runAction('index');

        // show menu is (\Yii::$app->user->isGuest)
        \PHPUnit_Framework_Assert::assertStringContainsString('Sign up', $viewRender);
        \PHPUnit_Framework_Assert::assertStringContainsString('Login', $viewRender);
        \PHPUnit_Framework_Assert::assertStringNotContainsString('Manage Users', $viewRender);
        \PHPUnit_Framework_Assert::assertStringNotContainsString('Settings Account', $viewRender);
        \PHPUnit_Framework_Assert::assertStringNotContainsString('Settings Profile', $viewRender);
        \PHPUnit_Framework_Assert::assertStringNotContainsString('Logout', $viewRender);

        // login user admin
        \Yii::$app->user->login(UserIdentity::findIdentity('admin'));

        // run actionIndex
        $viewRender = $this->controller->runAction('index');

        // show menu is (!\Yii::$app->user->isGuest)
        \PHPUnit_Framework_Assert::assertStringContainsString('Manage Users', $viewRender);
        \PHPUnit_Framework_Assert::assertStringContainsString('Settings Account', $viewRender);
        \PHPUnit_Framework_Assert::assertStringContainsString('Settings Profile', $viewRender);
        \PHPUnit_Framework_Assert::assertStringContainsString('Logout', $viewRender);
        \PHPUnit_Framework_Assert::assertStringNotContainsString('Sign up', $viewRender);
        \PHPUnit_Framework_Assert::assertStringNotContainsString('Login', $viewRender);
    }

    /**
     * mockWebApplication
     */
    protected function mockWebApplication($config = [], $appClass = \yii\web\Application::class): void
    {
        new $appClass(ArrayHelper::merge([
            'id' => \Yii::$app->params['app.basic.id'],
            'basePath' => '@root/src',
            'vendorPath' => \Yii::$app->params['app.basic.vendor.path'],
            'aliases' => [
                '@bower' => \Yii::$app->params['app.basic.alias.path.bower'],
                '@npm' => \Yii::$app->params['app.basic.alias.path.npm']
            ],
        ], $config));
    }

    /**
     * destroyApplication
     */
    protected function destroyApplication(): void
    {
        if (\Yii::$app && \Yii::$app->has('session', true)) {
            \Yii::$app->session->close();
        }
        \Yii::$app = null;
    }
}
