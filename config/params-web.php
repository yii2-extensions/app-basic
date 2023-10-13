<?php

declare(strict_types=1);

return [
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
    'app.menu.isguest' => [
        [
            'label' => \Yii::t('app.basic', 'About'),
            'url' => ['/about/index'],
            'order' => 1
        ],
        [
            'label' => \Yii::t('app.basic', 'Contact'),
            'url' => ['/contact/index'],
            'order' => 2
        ],
    ],
    'app.name' => 'app basic example',
    'app.id' => 'app.basic',

    'icons'  => '@npm/fortawesome--fontawesome-free/svgs/{family}/{name}.svg',

    'yii.debug' => true,
    'yii.gii' => true,
];
