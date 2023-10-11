<?php

declare(strict_types=1);

return [
    // mailer params
    'app.mailer.sender' => 'noreply@example.com',
    'app.mailer.sender.name' => 'app basic example',

    // menu params
    'app.menu.isguest' => [
        [
            'label' => \Yii::t('app.basic', 'About'),
            'url' => ['/about/index']
        ],
        [
            'label' => \Yii::t('app.basic', 'Contact'),
            'url' => ['/contact/index']
        ],
    ],

    // params sjaakp/yii2-icon
    'icons'  => '@npm/fortawesome--fontawesome-free/svgs/{family}/{name}.svg',
];
