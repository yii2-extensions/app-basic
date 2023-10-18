<?php

declare(strict_types=1);

use App\Framework\EventHandler\ContactEventHandler;

return [
    'bootstrap' => [
        ContactEventHandler::class,
    ],
];
