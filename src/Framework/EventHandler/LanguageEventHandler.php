<?php

declare(strict_types=1);

namespace App\Framework\EventHandler;

use Yii;
use yii\base\BootstrapInterface;
use yii\base\Event;
use yii\web\Application;
use yii\web\Cookie;

final class LanguageEventHandler implements BootstrapInterface
{
    /**
     * @param Application $app
     */
    public function bootstrap($app): void
    {
        Event::on(
            Application::class,
            Application::EVENT_BEFORE_REQUEST,
            static function (Event $event): void {
                if (php_sapi_name() === 'cli') {
                    return;
                }

                $languageNew = Yii::$app->request->get('language');

                if ($languageNew) {
                    $event->sender->language = $languageNew;

                    $cookie = new Cookie(['name' => 'language', 'value' => $languageNew, 'httpOnly' => true, 'sameSite' => 'strict']);

                    Yii::$app->getResponse()->getCookies()->add($cookie);
                } else {
                    $event->sender->language = Yii::$app->getRequest()->getCookies()->getValue('language', $_COOKIE['language'] ?? 'EN');
                }
            }
        );
    }
}
