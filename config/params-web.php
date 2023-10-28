<?php

declare(strict_types=1);

use App\UseCase\About\AboutController;
use App\UseCase\Contact\ContactController;
use App\UseCase\Site\SiteController;

$rootDir = dirname(__DIR__);

return [
    // web application settings shared
    'app.aliases' => [
        '@app' => $rootDir,
        '@bower' => '@app/node_modules',
        '@npm'   => '@app/node_modules',
        '@public' => '@app/public',
        '@web' => '@public',
        '@resource' => '@app/src/Framework/resource',
        '@runtime' => '@public/runtime',
    ],
    'app.assetManager.basePath' => '@public/assets',
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
    'app.errorHandler.errorAction' => 'site/404',
    'app.id' => 'app.basic',
    'app.language' => 'en-US',
    'app.name' => 'Web application basic',
    'app.params' => [
        'app.mailer.sender' => 'noreply@example.com',
        'app.mailer.sender.name' => 'Web application basic',
        'app.menu.isguest' => [
            [
                'label' => Yii::t('app.basic', 'About'),
                'url' => ['/about/index'],
                'order' => 1
            ],
            [
                'label' => Yii::t('app.basic', 'Contact'),
                'url' => ['/contact/index'],
                'order' => 2
            ],
        ],
        'app.menu.islogged' => [],
        'icons'  => '@npm/fortawesome--fontawesome-free/svgs/{family}/{name}.svg',
    ],
    'app.request.cookieValidationKey' => 'your-cookie-validation-key',
    'app.request.enableCsrfValidation' => true,
    'app.root.dir' => $rootDir,
    'app.urlManager.enablePrettyUrl' => true,
    'app.urlManager.showScriptName' => false,

    // yii2 extensions settings
    'yii.debug' => false,
    'yii.gii' => false,
];
