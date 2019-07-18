<?php

namespace terabytesoft\app\basic\tests;

use DMS\PHPUnitExtensions\ArraySubset\Assert;
use terabytesoft\app\basic\controllers\SiteController;
use terabytesoft\app\basic\forms\ContactForm;

class ContactFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \yii\base\Controller $controller
     */
    protected $controller;

    /**
     * @var \yii\base\Model $model
     */
    protected $model;

    /**
     * @var array $rules
     */
    protected $rules;

    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * _before
     */
    public function _before(): void
    {
        $this->controller = new SiteController('SiteController', \Yii::$app, []);
        $this->model = new ContactForm();
    }
    /**
     * _after
     */
    public function _after(): void
    {
        unset($this->controller);
        unset($this->model);
        unset($this->tester);
    }

    /**
     * testContactFormRules
     */
    public function testContactFormRules(): void
    {
        // test rules form model.
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

        \PHPUnit_Framework_Assert::assertTrue($this->model->validate());

        $this->controller->sendContact($this->model);

        // using Yii2 module actions to check email was sent
        $this->tester->seeEmailIsSent();

        /** @var MessageInterface $emailMessage */
        $emailMessage = $this->tester->grabLastSentEmail();

        \PHPUnit_Framework_Assert::assertInstanceOf(\yii\mail\MessageInterface::class, $emailMessage);
        \PHPUnit_Framework_Assert::assertArrayHasKey('tester@example.com', $emailMessage->getTo());
        \PHPUnit_Framework_Assert::assertArrayHasKey('noreply@appbasic.com', $emailMessage->getFrom());
        \PHPUnit_Framework_Assert::assertArrayHasKey('tester@example.com', $emailMessage->getReplyTo());
        \PHPUnit_Framework_Assert::assertEquals('very important letter subject', $emailMessage->getSubject());
        \PHPUnit_Framework_Assert::assertStringContainsString('body of current message', $emailMessage);
    }
}
