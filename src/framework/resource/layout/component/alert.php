<?php

declare(strict_types=1);

use UIAwesome\Html\{Component\Bootstrap5\Alert};

$session = Yii::$app->session;
$flashMessages = $session->getAllFlashes();
$html = [];

foreach ($flashMessages as $type => $message) {
    if (in_array($type, ['danger', 'dark', 'info', 'success', 'warning'], true) === true) {
        $html[] = Alert::widget()->cookbook('dismissible', $type)->content($message);
    }
}
?>
<div id ="alert_dismissing">
    <?= implode('', $html) ?>
</div>
