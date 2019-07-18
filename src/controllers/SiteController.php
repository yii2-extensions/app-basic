<?php

namespace terabytesoft\app\basic\controllers;

use terabytesoft\app\basic\forms\ContactForm;
use terabytesoft\helpers\Mailer;
use yii\base\Model;
use yii\base\Module;
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
     * @var object
     */
    private $mailer;

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
                'fixedVerifyCode' => (YII_ENV === 'test') ? 'testme' : null,
            ],
        ];
    }

    /**
     * __construct
     */
    public function __construct($id, Module $module, array $config = [])
    {
        $this->mailer = new Mailer(\Yii::$app->mailer);
        parent::__construct($id, $module, $config);
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
            $this->sendContact($model);

            $this->module->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * sendContact
     * @param Model $model
     **/
    public function sendContact(Model $model): void
    {
        $this->mailer->sendMessage(
            $model->email,
            $model->subject,
            [
                'replyTo' => [
                    $model->email => $model->name
                ],
                'textBody' => $model->body
            ]
        );
    }
}
