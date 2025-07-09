<?php

declare(strict_types=1);

namespace app\usecase\contact;

use Yii;
use yii\base\Model;
use yii\captcha\CaptchaValidator;

final class ContactForm extends Model
{
    public string $name = '';
    public string $email = '';
    public string $subject = '';
    public string $body = '';
    public string $verifyCode = '';
    public string $date = '';

    public function attributeLabels(): array
    {
        return [
            'name' => Yii::t('app.basic', 'Name'),
            'email' => Yii::t('app.basic', 'Email'),
            'subject' => Yii::t('app.basic', 'Subject'),
            'body' => Yii::t('app.basic', 'Body'),
            'verifyCode' => Yii::t('app.basic', 'Captcha Code'),
        ];
    }

    public function rules(): array
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', CaptchaValidator::class, 'captchaAction' => '/contact/captcha', 'message' => ''],
        ];
    }
}
