<?php

declare(strict_types=1);

namespace App\UseCase\Contact;

use yii\base\Model;
use yii\base\Module;
use yii\captcha\CaptchaValidator;

/**
 * Form model for contact page.
 */
class ContactForm extends Model
{
    public string $name = '';
    public string $email = '';
    public string $subject = '';
    public string $body = '';
    public string $verifyCode = '';

    public function rules(): array
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', CaptchaValidator::class, 'captchaAction' => '/contact/captcha'],
        ];
    }

    public function sendContact(Module $module): bool
    {
        return $module->mailer->compose()
            ->setTo($this->email)
            ->setFrom([$module->params['mailer.sender'] => $module->params['mailer.sender.name']])
            ->setReplyTo([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }
}
