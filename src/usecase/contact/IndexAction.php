<?php

declare(strict_types=1);

namespace app\usecase\contact;

use yii\base\Action;

/**
 * @template T of ContactController
 * @extends Action<T>
 */
final class IndexAction extends Action
{
    public function run(): string
    {
        $form = new ContactForm();
        $post = $this->controller->request->post();

        if (is_array($post) && $form->load($post) && $form->validate()) {
            if ($this->controller->sendEmail($form)) {
                $this->trigger(ContactEvent::EVENT_AFTER_SEND, new ContactEvent());
            }
        }

        return $this->controller->render('index', ['model' => $form]);
    }
}
