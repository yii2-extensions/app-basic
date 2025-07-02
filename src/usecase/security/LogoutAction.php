<?php

declare(strict_types=1);

namespace app\usecase\security;

use yii\base\Action;
use yii\web\Response;

/**
 * @template T of SecurityController
 * @extends Action<T>
 */
final class LogoutAction extends Action
{
    public function run(): Response
    {
        $this->controller->getUser()->logout();

        return $this->controller->goHome();
    }
}
