<?php

declare(strict_types=1);

use App\UseCase\About\AboutController;
use App\UseCase\Contact\ContactController;
use App\UseCase\Site\SiteController;

return [
    'app.aliases' => [
        '@app' => dirname(__DIR__),
        '@bower' => '@app/node_modules',
        '@npm'   => '@app/node_modules',
        '@public' => '@app/public',
        '@web' => '@public',
        '@resource' => '@app/src/Framework/resource',
        '@runtime' => '@public/runtime',
    ],
    'app.controllerMap' => [
        'about' => [
            'class' => AboutController::class,
        ],
        'contact' => [
            'class' => ContactController::class,
        ],
        'site' => [
            'class' => SiteController::class,
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
    'app.id' => 'app.basic',

    'icons'  => '@npm/fortawesome--fontawesome-free/svgs/{family}/{name}.svg',

    'yii.debug' => true,
    'yii.gii' => true,
];
