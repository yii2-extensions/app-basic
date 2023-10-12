<?php

declare(strict_types=1);

/**
 * @var array $params
 */
return [
    'container' => [
        'definitions' => [
            \yii\symfonymailer\Mailer::class => [
                'useFileTransport' => true,
            ],
        ],
        'singletons' => [
            \yii\web\Session::class => static function (): \yii\web\Session {
                return new \yii\web\Session();
            },
        ],
    ],
];
