<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\UseCase\Contact\ContactForm;
use Codeception\Test\Unit;
use Yii;
use yii\mail\MessageInterface;

use function verify;

final class ContactFormTest extends Unit
{
    public mixed $tester;

    public function testEmailIsSentOnContact(): void
    {
        $formModel = new ContactForm();

        $formModel->attributes = [
            'name' => 'Tester',
            'email' => 'tester@example.com',
            'subject' => 'very important letter subject',
            'body' => 'body of current message',
            'verifyCode' => 'testme',
        ];

        verify($formModel->sendContact(Yii::$app->mailer, Yii::$app->params))->notEmpty();

        // using Yii2 module actions to check email was sent
        $this->tester->seeEmailIsSent();

        /** @var MessageInterface $emailMessage */
        $emailMessage = $this->tester->grabLastSentEmail();

        verify($emailMessage)->instanceOf(MessageInterface::class);
        verify($emailMessage->getTo())->arrayHasKey('tester@example.com');
        verify($emailMessage->getFrom())->arrayHasKey('noreply@example.com');
        verify($emailMessage->getReplyTo())->arrayHasKey('tester@example.com');
        verify($emailMessage->getSubject())->equals('very important letter subject');
        verify($emailMessage->toString())->stringContainsString('body of current message');
    }
}
