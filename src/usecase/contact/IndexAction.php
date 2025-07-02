<?php

declare(strict_types=1);

namespace app\usecase\contact;

use yii\base\Action;
use yii\symfonymailer\Mailer;
use yii\web\{Controller, Request, Session};

/**
 * @extends Action<ContactController>
 */
final class IndexAction extends Action
{
    public function __construct(
        string $id,
        Controller $controller,
        private readonly Mailer $mailer,
        private readonly Request $request,
        private readonly Session $session,
        array $config = [],
    ) {
        parent::__construct($id, $controller, $config);
    }

    public function run(): string
    {
        $contactForm = new ContactForm();

        $post = $this->request->post();

        if (is_array($post) && $contactForm->load($post) && $contactForm->validate()) {
            if ($contactForm->sendContact($this->mailer, $this->controller->module->params)) {
                $this->trigger(ContactEvent::EVENT_AFTER_SEND, new ContactEvent());
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
