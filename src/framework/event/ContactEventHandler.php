<?php

declare(strict_types=1);

namespace app\framework\event;

use app\usecase\contact\ContactEvent;
use app\usecase\contact\IndexAction;
use yii\base\BootstrapInterface;
use yii\base\Event;

final class ContactEventHandler implements BootstrapInterface
{
    public function bootstrap($app): void
    {
        Event::on(
            IndexAction::class,
            ContactEvent::EVENT_AFTER_SEND,
            static function () use ($app): void {
                $title = \Yii::t(
                    'app.basic',
                    'Message sent successfully!.',
                );
                $message = \Yii::t(
                    'app.basic',
                    'Thank you for contacting us. We will respond to you as soon as possible.',
                );

                $app->session->setFlash('success', "{$title}<br>{$message}");
            },
        );
    }
}
