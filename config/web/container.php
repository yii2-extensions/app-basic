<?php

declare(strict_types=1);

use yii\symfonymailer\Mailer;
use yii\web\Session;

return [
    'container' => [
        'definitions' => [
            Mailer::class => [
                'useFileTransport' => true,
            ],
        ],
        'singletons' => [
            Session::class => static function (): Session {
                return new Session();
            },
        ],
    ],
];
