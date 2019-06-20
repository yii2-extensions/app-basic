<?php

namespace terabytesoft\app\basic\controllers;

use terabytesoft\app\basic\forms\ContactForm;
use yii\base\Model;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    public $app;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * actionAbout.
     *
     * displays about page
     *
     * @return string
     **/
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * actionContact.
     *
     * displays contact page
     *
     * @return response|string
     **/
    public function actionContact()
    {
        $model = new ContactForm();

        if ($model->load($this->module->request->post()) && $model->validate()) {
            $this->sendContact($this->module->params['app.basic.email'], $model);
            $this->module->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * sendContactForm.
     *
     * sends an email to the specified email address using the information collected by this model
     *
     * @param string $email the target email address
     * @param Model  $model
     *
     * @return bool whether the model passes validation
     **/
    public function sendContact(string $email, Model $model)
    {
        $this->module->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->module->params['senderEmail'] => $this->module->params['senderName']])
            ->setReplyTo([$model->email => $model->name])
            ->setSubject($model->subject)
            ->setTextBody($model->body)
            ->send();
    }
}
