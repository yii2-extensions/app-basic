<?php

declare(strict_types=1);

namespace App\UseCase\Contact;

use App\UseCase\Controller;
use yii\base\Module;
use yii\captcha\CaptchaAction;
use yii\web\Request;
use yii\web\Response;
use yii\web\Session;

final class ContactController extends Controller
{
    public function actions(): array
    {
        $actions = parent::actions();

        return array_merge(
            [
                'captcha' => [
                    'class' => CaptchaAction::class,
                    'fixedVerifyCode' => (YII_ENV === 'tests') ? 'testme' : null,
                ],
            ],
            parent::actions(),
        );
    }

    public function __construct(
        $id,
        Module $module,
        private ContactForm $formModel,
        private Session $session,
        array $config = []
    ) {
        parent::__construct($id, $module, $config);
    }

    public function actionIndex(): Response|string
    {
        $mailer = $this->getMailer();

        if ($this->formModel->load($this->getRequest()->post()) && $this->formModel->validate()) {
            if ($this->formModel->sendContact($mailer, $this->module->params)) {
                $this->session->setFlash('contactFormSubmitted');
            }

            return $this->refresh();
        }

        return $this->render(
            'index',
            [
                'model' => $this->formModel,
                'mailer' => $mailer,
                'session' => $this->session,
            ],
        );
    }

    public function getViewPath(): string
    {
        return __DIR__ . '/view';
    }
}
