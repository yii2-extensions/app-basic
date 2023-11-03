<?php

declare(strict_types=1);

use PHPForge\Component\Alert;

$alertTypes = [
    'danger' => 'alert alert-danger alert-dismissible fade show',
    'dark' => 'alert alert-dark alert-dismissible fade show',
    'info' => 'alert alert-info alert-dismissible fade show',
    'light' => 'alert alert-light alert-dismissible fade show',
    'primary' => 'alert alert-primary alert-dismissible fade show',
    'secondary' => 'alert alert-secondary alert-dismissible fade show',
    'success' => 'alert alert-success alert-dismissible fade show',
    'warning' => 'alert alert-warning alert-dismissible fade show',
];

$session = Yii::$app->getSession();
$flashes = $session->getAllFlashes();

foreach ($flashes as $type => $message) {
    if (isset($alertTypes[$type])) {
        /* initialize css class for each alert box */
        echo Alert::widget()
            ->class($alertTypes[$type])
            ->content($message)
            ->toggleAttributes(['aria-label' => 'Close', 'data-bs-dismiss' => 'alert'])
            ->toggleClass('btn-close')
            ->render();

        $session->removeFlash($type);
    }
}
