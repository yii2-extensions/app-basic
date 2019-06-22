<?php

namespace terabytesoft\app\basic\controllers;

use terabytesoft\app\basic\forms\ContactForm;
use yii\base\Model;
use yii\captcha\CaptchaAction;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\Response;

/**
 * SiteController
 *
 * Controller web application basic
 */
class SiteController extends Controller
{
    /**
     * @var array
     */
    public $app;

    /**
     * behaviors
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    /**
     * actions
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
            'captcha' => [
                'class' => CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV ? 'testme' : null,
            ],
        ];
    }

    /**
     * actionIndex
     */
    public function actionIndex(): string
    {
        return $this->render('index');
    }

    /**
     * actionAbout
     **/
    public function actionAbout(): string
    {
        return $this->render('about');
    }

    /**
     * actionContact
     * @return response|string
     **/
    public function actionContact()
    {
        $model = new ContactForm();

        if ($model->load($this->module->request->post()) && $model->validate()) {
            $this->sendContact($this->module->params['app.basic.email.admin'], $model);
            $this->module->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * sendContact
     * @param string $email the target email address
     * @param Model  $model
     **/
    public function sendContact(string $email, Model $model): void
    {
        $this->module->mailer->compose()
            ->setTo($email)
            ->setFrom(
                [$this->module->params['app.basic.email.admin'] => $this->module->params['app.basic.email.sendername']]
            )
            ->setReplyTo([$model->email => $model->name])
            ->setSubject($model->subject)
            ->setTextBody($model->body)
            ->send();
    }
}
