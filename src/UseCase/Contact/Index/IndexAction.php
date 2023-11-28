<?php

declare(strict_types=1);

namespace App\UseCase\Contact\Index;

use App\UseCase\Contact\ContactEvent;
use yii\base\Action;
use yii\symfonymailer\Mailer;
use yii\web\Controller;
use yii\web\Request;
use yii\web\Response;
use yii\web\Session;

final class IndexAction extends Action
{
    public function __construct(
        string $id,
        Controller $controller,
        private readonly Mailer $mailer,
        private readonly Session $session,
        array $config = []
    ) {
        parent::__construct($id, $controller, $config);
    }

    public function run(): Response|string
    {
        $contactForm = new $this->controller->formModelClass();
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

            return $this->controller->refresh();
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
