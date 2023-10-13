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

$session = Yii::$app->getSession();
$flashes = $session->getAllFlashes();

foreach ($flashes as $type => $message) {
    if (isset($alertTypes[$type])) {
        /* initialize css class for each alert box */
        $options['class'] = $alertTypes[$type];

        echo Alert::widget(
            [
                'body' => $message,
                'options' => $options,
            ]
        );

        $session->removeFlash($type);
    }
}
