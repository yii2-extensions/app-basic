<?php

declare(strict_types=1);

use App\Framework\EventHandler\ContactEventHandler;
use App\Framework\EventHandler\LanguageEventHandler;

return [
    'bootstrap' => [
        ContactEventHandler::class,
        LanguageEventHandler::class,
    ],
];
