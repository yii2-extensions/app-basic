<?php

declare(strict_types=1);

namespace app\usecase\contact;

use app\framework\ApplicationParameters;
use app\usecase\Controller;
use yii\captcha\CaptchaAction;
use yii\helpers\ArrayHelper;
use yii\mail\MailerInterface;

final class ContactController extends Controller
{
    public function actions(): array
    {
        return ArrayHelper::merge(
            [
                'index' => [
                    'class' => IndexAction::class,
                ],
                'captcha' => [
                    'class' => CaptchaAction::class,
                    'fixedVerifyCode' => (YII_ENV === 'tests') ? 'testme' : null,
                    'transparent' => true,
                ],
            ],
            parent::actions(),
        );
    }

    public function getMailer(): MailerInterface
    {
        return $this->module->get('mailer');
    }

    public function getViewPath(): string
    {
        return __DIR__ . '/view';
    }

    public function sendEmail(ContactForm $form): bool
    {
        return $this->getMailer()
            ->compose()
            ->setTo($form->email)
            ->setFrom([ApplicationParameters::getMailerSender() => ApplicationParameters::getMailerSenderName()])
            ->setReplyTo([$form->email => $form->name])
            ->setSubject($form->subject)
            ->setTextBody($form->body)
            ->send();
    }
}
