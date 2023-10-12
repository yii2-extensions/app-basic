<?php

declare(strict_types=1);

return [
    // app
    'app.bootstrap' => ['log'],

    // console
    'app.console.id' => 'console.basic',

    // controller map
    'app.controllerMap' => [
        'about' => [
            'class' => \App\UseCase\About\AboutController::class,
        ],
        'contact' => [
            'class' => \App\UseCase\Contact\ContactController::class,
        ],
        'site' => [
            'class' => \App\UseCase\Site\SiteController::class,
        ],
    ],

    // language
    'app.language' => 'en-US',

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

    // name
    'app.name' => 'app basic example',

    // web
    'app.web.id' => 'app.basic',

    // params sjaakp/yii2-icon
    'icons'  => '@npm/fortawesome--fontawesome-free/svgs/{family}/{name}.svg',

    // extensions yii
    'yii.debug' => true,
    'yii.gii' => true,
];
