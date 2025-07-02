<?php

declare(strict_types=1);

namespace app\usecase\security;

use app\usecase\Controller;
use yii\helpers\ArrayHelper;
use yii\web\User;

final class SecurityController extends Controller
{
    public function actions(): array
    {
        return ArrayHelper::merge(
            [
                'logout' => [
                    'class' => LogoutAction::class,
                ],
                'login' => [
                    'class' => LoginAction::class,
                ],
            ],
            parent::actions(),
        );
    }

    /**
     * @phpstan-return User<Identity>
     */
    public function getUser(): User
    {
        return $this->module->get('user');
    }

    public function getViewPath(): string
    {
        return __DIR__ . '/view';
    }
}
