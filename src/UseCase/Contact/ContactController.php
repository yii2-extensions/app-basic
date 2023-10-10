<?php

declare(strict_types=1);

namespace App\UseCase\Contact;

use App\UseCase\Controller;
use yii\base\Module;
use yii\captcha\CaptchaAction;
use yii\web\Response;

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
        array $config = []
    ) {
        parent::__construct($id, $module, $config);
    }

    public function actionIndex(): Response|string
    {
        if ($this->formModel->load($this->module->request->post()) && $this->formModel->validate()) {
            if ($this->formModel->sendContact($this->module)) {
                $this->module->session->setFlash('contactFormSubmitted');
            }

            return $this->refresh();
        }

        return $this->render('index', ['model' => $this->formModel]);
    }

    public function getViewPath(): string
    {
        return __DIR__ . '/view';
    }
}
