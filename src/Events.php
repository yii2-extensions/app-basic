<?php

declare(strict_types=1);

namespace App;

use App\UseCase\Contact\ContactController;
use App\UseCase\Contact\ContactEvent;
use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\base\Event;

final class Events implements BootstrapInterface
{
    /**
     * @param Application $app
     */
    public function bootstrap($app): void
    {
        Event::on(
            ContactController::class,
            ContactEvent::EVENT_AFTER_SEND,
            static function (): void {
                Yii::$app->session->setFlash(
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
