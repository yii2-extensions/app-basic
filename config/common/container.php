<?php

declare(strict_types=1);

use yii\symfonymailer\Mailer;

/**
 * @var array $params
 */
return [
    'container' => [
        'definitions' => [
            Mailer::class => [
                'useFileTransport' => $params['common.mailer.useFileTransport'],
            ],
        ],
    ],
];
