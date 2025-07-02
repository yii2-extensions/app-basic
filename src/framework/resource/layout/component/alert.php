<?php

declare(strict_types=1);

use yii\bootstrap5\Alert;

$alertTypes = [
    'danger' => 'alert-danger',
    'dark' => 'alert-dark',
    'info' => 'alert-info',
    'light' => 'alert-light',
    'primary' => 'alert-primary',
    'secondary' => 'alert-secondary',
    'success' => 'alert-success',
    'warning' => 'alert-warning',
];

$flashes = Yii::$app->session->getAllFlashes();

foreach ($flashes as $type => $message) {
    if (isset($alertTypes[$type])) {
        echo Alert::widget(
            [
                'body' => $message,
                'options' => [
                    'class' => $alertTypes[$type],
                ],
            ]
        );

        Yii::$app->session->removeFlash($type);
    }
}
