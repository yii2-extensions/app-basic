<?php

declare(strict_types=1);

use yii\web\Session;

/**
 * @var array $params
 */
return [
    'container' => [
        'singletons' => [
            Session::class => static function (): Session {
                return new Session();
            },
        ],
    ],
];
