<?php

namespace Terabytesoft\App\Basic;

use DMS\PHPUnitExtensions\ArraySubset\Assert;
use terabytesoft\app\basic\controllers\SiteController;
use terabytesoft\app\basic\forms\ContactForm;

class ContactFormTest extends \Codeception\Test\Unit
{
    private $config = [];
    private $controller;
    private $model;
    private $rules;

    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * testContactFormRules
     */
    public function testContactFormRules(): void
    {
        // test rules form model.
        $this->model = new ContactForm();
        $this->rules = [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', \yii\captcha\CaptchaValidator::class],
        ];

        Assert::AssertArraySubset($this->model->rules(), $this->rules, true);
    }

    /**
     * testContactFormSentEmail
     */
    public function testContactFormSentEmail(): void
    {
        $this->controller = new SiteController('SiteController', \Yii::$app, $this->config);

        /** @var ContactForm $model */
        $this->model = $this->getMockBuilder('terabytesoft\app\basic\forms\ContactForm')
            ->setMethods(['validate'])
            ->getMock();

        $this->model->expects($this->once())
            ->method('validate')
            ->willReturn(true);

        $this->model->attributes = [
            'name' => 'Tester',
            'email' => 'tester@example.com',
            'subject' => 'very important letter subject',
            'body' => 'body of current message',
        ];

        expect($this->model->validate());

        $this->controller->sendContact('admin@example.com', $this->model);

        // using Yii2 module actions to check email was sent
        $this->tester->seeEmailIsSent();

        /** @var MessageInterface $emailMessage */
        $emailMessage = $this->tester->grabLastSentEmail();

        expect('valid email is sent', $emailMessage)->isInstanceOf('yii\swiftmailer\Message');
        expect($emailMessage->getTo())->hasKey('admin@example.com');
        expect($emailMessage->getFrom())->hasKey('noreply@example.com');
        expect($emailMessage->getReplyTo())->hasKey('tester@example.com');
        expect($emailMessage->getSubject())->equals('very important letter subject');

        \PHPUnit_Framework_Assert::assertStringContainsString('body of current message', $emailMessage);
    }
}
