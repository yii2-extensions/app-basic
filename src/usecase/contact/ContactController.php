<?php

declare(strict_types=1);

namespace app\usecase\contact;

use app\usecase\Controller;
use yii\captcha\CaptchaAction;
use yii\helpers\ArrayHelper;

final class ContactController extends Controller
{
    /**
     * @phpstan-var class-string<ContactForm>
     */
    public string $formModelClass = ContactForm::class;

    public function actions(): array
    {
        return ArrayHelper::merge(
            [
                'index' => [
                    'class' => IndexAction::class,
                    'formModelClass' => $this->formModelClass,
                ],
                'captcha' => [
                    'class' => CaptchaAction::class,
                    'fixedVerifyCode' => (YII_ENV === 'tests') ? 'testme' : null,
                ],
            ],
            parent::actions(),
        );
    }

    public function getViewPath(): string
    {
        return __DIR__ . '/view';
    }
}
