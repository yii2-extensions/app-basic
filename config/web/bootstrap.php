<?php

declare(strict_types=1);

use app\framework\event\ContactEventHandler;

return [
    'bootstrap' => [
        ContactEventHandler::class,
    ],
];
