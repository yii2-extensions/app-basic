<?php

declare(strict_types=1);

use app\framework\events\ContactEventHandler;

return [
    'bootstrap' => [
        ContactEventHandler::class,
    ],
];
