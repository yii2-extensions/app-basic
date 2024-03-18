<?php

declare(strict_types=1);

use UIAwesome\Html\Component\Alert;
use UIAwesome\Html\Component\Cookbook\BootstrapAlertDismiss;
use UIAwesome\Html\Group\Div;

$session = Yii::$app->getSession();
$flashMessages = $session->getAllFlashes();
$html = [];

foreach ($flashMessages as $type => $message) {
    if (in_array($type, ['danger', 'dark', 'info', 'success', 'warning'], true) === true) {
        $html[] = Alert::widget(BootstrapAlertDismiss::definitions($type))->content($message);
    }
}

echo Div::widget()->id('alert_dismissing')->content(...$html);
