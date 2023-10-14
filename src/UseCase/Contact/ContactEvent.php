<?php

declare(strict_types=1);

namespace App\UseCase\Contact;

use yii\base\Event;
use yii\base\Model;

final class ContactEvent extends Event
{
    public const EVENT_AFTER_SEND = 'contact.afterSend';
}
