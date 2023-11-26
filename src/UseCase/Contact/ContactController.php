<?php

declare(strict_types=1);

namespace App\UseCase\Contact;

use App\UseCase\Controller;
use yii\base\Module;
use yii\captcha\CaptchaAction;
use yii\symfonymailer\Mailer;
use yii\web\Request;
use yii\web\Response;
use yii\web\Session;

final class ContactController extends Controller
{
    public function actions(): array
    {
        return array_merge(
            [
                'captcha' => [
                    'class' => CaptchaAction::class,
                    'fixedVerifyCode' => (YII_ENV === 'test') ? 'testme' : null,
                ],
            ],
            parent::actions(),
        );
    }

    public function __construct(
        $id,
        Module $module,
        private readonly ContactEvent $contactEvent,
        private readonly ContactForm $contactForm,
        private readonly Mailer $mailer,
        private readonly Session $session,
        array $config = []
    ) {
        parent::__construct($id, $module, $config);
    }

    public function actionIndex(): Response|string
    {
        if (
            $this->request instanceof Request &&
            $this->contactForm->load($this->request->post()) && $this->contactForm->validate()
        ) {
            if ($this->contactForm->sendContact($this->mailer, $this->module->params)) {
                $this->session->setFlash('contactFormSubmitted');

                $this->trigger(ContactEvent::EVENT_AFTER_SEND, $this->contactEvent);
            }

            return $this->refresh();
        }

        return $this->render(
            'index',
            [
                'model' => $this->contactForm,
                'mailer' => $this->mailer,
                'session' => $this->session,
            ],
        );
    }

    public function getViewPath(): string
    {
        return __DIR__ . '/view';
    }
}
