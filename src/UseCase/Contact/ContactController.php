<?php

declare(strict_types=1);

namespace App\UseCase\Contact;

use App\UseCase\Controller;
use yii\captcha\CaptchaAction;

use function array_merge;

final class ContactController extends Controller
{
    /**
     * @phpstan-var class-string<ContactForm>
     */
    public string $formModelClass = ContactForm::class;

    public function actions(): array
    {
        return array_merge(
            [
                'index' => [
                    'class' => Index\IndexAction::class,
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
