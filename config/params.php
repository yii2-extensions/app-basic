<?php

declare(strict_types=1);

return [
    'common.bootstrap' => ['log'],
    'common.mailer.useFileTransport' => true,
    'common.log.levels' => ['error', 'warning', 'info'],
    'common.log.logFile' => '@runtime/logs/app.log',
];
