<?php

declare(strict_types=1);

namespace app\tests\Unit;

use app\usecase\contact\ContactController;
use app\usecase\contact\ContactForm;
use Codeception\Module\Yii2;
use Codeception\Test\Unit;
use Yii;
use yii\mail\MessageInterface;

use function verify;

final class ContactControllerTest extends Unit
{
    public mixed $tester = null;

    public function testEmailIsSentOnContact(): void
    {
        $controller = new ContactController('contact', Yii::$app);
        $form = new ContactForm();

        $form->attributes = [
            'name' => 'Tester',
            'email' => 'tester@example.com',
            'subject' => 'very important letter subject',
            'body' => 'body of current message',
            'verifyCode' => 'testme',
        ];

        verify($controller->sendEmail($form))->notEmpty();
        assert(
            $this->tester instanceof Yii2,
            '\'Yii2\' module should be available in the tester',
        );

        $this->tester->seeEmailIsSent();
        $emailMessage = $this->tester->grabLastSentEmail();

        assert(
            $emailMessage instanceof MessageInterface,
            'Last sent email should be an instance of \'MessageInterface\'',
        );

        verify($emailMessage->getTo())->arrayHasKey('tester@example.com');
        verify($emailMessage->getFrom())->arrayHasKey('noreply@example.com');
        verify($emailMessage->getReplyTo())->arrayHasKey('tester@example.com');
        verify($emailMessage->getSubject())->equals('very important letter subject');
        verify($emailMessage->toString())->stringContainsString('body of current message');
    }
}
