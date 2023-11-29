<?php

declare(strict_types=1);

namespace App\Framework\EventHandler;

use App\UseCase\Contact\ContactEvent;
use App\UseCase\Contact\Index\IndexAction;
use Yii;
use yii\base\BootstrapInterface;
use yii\base\Event;
use yii\web\Application;

final class ContactEventHandler implements BootstrapInterface
{
    /**
     * @param Application $app
     */
    public function bootstrap($app): void
    {
        Event::on(
            IndexAction::class,
            ContactEvent::EVENT_AFTER_SEND,
            static function () use ($app): void {
                $app->session->setFlash(
                    'success',
                    Yii::t(
                        'app.basic',
                        'Thank you for contacting us. We will respond to you as soon as possible.'
                    )
                );
            }
        );
    }
}
