<?php

declare(strict_types=1);

namespace app\usecase\contact;

use yii\base\{Action, InvalidConfigException};
use yii\symfonymailer\Mailer;
use yii\web\{Controller, Request, Session};

final class IndexAction extends Action
{
    public string $formModelClass = '';

    public function __construct(
        string $id,
        Controller $controller,
        private readonly Mailer $mailer,
        private readonly Session $session,
        array $config = [],
    ) {
        parent::__construct($id, $controller, $config);
    }

    public function run(): string
    {
        if ($this->formModelClass === '') {
            throw new InvalidConfigException('The "formModelClass" property must be set.');
        }

        $contactForm = new $this->formModelClass();
        $contactEvent = new ContactEvent();

        if (
            $this->controller->request instanceof Request &&
            $contactForm->load($this->controller->request->post()) &&
            $contactForm->validate()
        ) {
            if ($contactForm->sendContact($this->mailer, $this->controller->module->params)) {
                $this->session->setFlash('contactFormSubmitted');

                $this->trigger(ContactEvent::EVENT_AFTER_SEND, $contactEvent);
            }
        }

        return $this->controller->render(
            'index',
            [
                'model' => $contactForm,
                'mailer' => $this->mailer,
                'session' => $this->session,
            ],
        );
    }
}
