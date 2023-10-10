<?php

declare(strict_types=1);

return [
    // menu default without extension ['yii2-extensions/app-user']
    'app.basic.menu.isguest' => [
        [
            'label' => \Yii::t('app.basic', 'About'),
            'url' => ['/about/index']
        ],
        [
            'label' => \Yii::t('app.basic', 'Contact'),
            'url' => ['/contact/index']
        ],
    ],

    'app.basic.setting.menu.user.isguest' => [],

    'mailer.sender' => 'noreply@example.com',
    'mailer.sender.name' => 'app basic example',

    'icons'  => '@npm/fortawesome--fontawesome-free/svgs/{family}/{name}.svg',
];
