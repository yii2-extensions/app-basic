<?php

declare(strict_types=1);

namespace app\usecase\security;

use yii\base\Action;
use yii\web\Response;

/**
 * @template T of SecurityController
 * @extends Action<T>
 */
final class LoginAction extends Action
{
    public function run(): string|Response
    {
        if ($this->controller->getUser()->isGuest === false) {
            return $this->controller->goHome();
        }

        $form = new LoginForm();
        $post = $this->controller->request->post();

        if (is_array($post) && $form->load($post) && $this->login($form)) {
            return $this->controller->goBack();
        }

        return $this->controller->render('login', ['model' => $form]);
    }

    private function login(LoginForm $form): bool
    {
        $identity = $form->getIdentity();

        if ($identity instanceof Identity && $form->validate()) {
            return $this->controller->getUser()->login($identity, $form->rememberMe ? 3600*24*30 : 0);
        }

        return false;
    }
}
