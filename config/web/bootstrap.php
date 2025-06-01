<?php

declare(strict_types=1);

use app\Framework\events\ContactEventHandler;

return [
    'bootstrap' => [
        ContactEventHandler::class,
    ],
];
