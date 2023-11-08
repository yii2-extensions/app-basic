<?php

declare(strict_types=1);

use App\UseCase\About\AboutController;
use App\UseCase\Contact\ContactController;
use App\UseCase\Site\SiteController;

return [
    // web application settings shared
    'common.aliases' => [
        '@bower' => '@app/node_modules',
        '@npm'   => '@app/node_modules',
        '@public' => '@app/public',
        '@web' => '@public',
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
    'app.language' => 'en',
    'app.name' => 'Web application basic',
    'app.params' => [
        'app.languages' => ['de-*', 'en-*', 'es-*', 'fr-*', 'pt-*', 'ru-*', 'zh-*'],
        'app.languages.labels' => [
            'de' => 'German',
            'en' => 'English',
            'es' => 'Spanish',
            'fr' => 'French',
            'pt' => 'Portuguese',
            'ru' => 'Russian',
            'zh' => 'Chinese',
        ],
        'app.mailer.sender' => 'noreply@example.com',
        'app.mailer.sender.name' => 'Web application basic',
        'app.menu.isguest' => [
            [
                'label' => 'About',
                'url' => ['/about/index'],
                'order' => 1,
                'category' => 'app.basic',
            ],
            [
                'label' => 'Contact',
                'url' => ['/contact/index'],
                'order' => 2,
                'category' => 'app.basic',
            ],
        ],
        'app.menu.islogged' => [],
        'icons'  => '@npm/fortawesome--fontawesome-free/svgs/{family}/{name}.svg',
    ],
    'app.request.cookieValidationKey' => 'your-cookie-validation-key',
    'app.request.enableCsrfValidation' => true,
    'app.urlManager.enablePrettyUrl' => true,
    'app.urlManager.showScriptName' => false,

    // yii2 extensions settings
    'yii2.debug' => false,
    'yii2.gii' => false,
    'yii2.localeurls.languages' => ['de', 'en', 'es', 'fr', 'pt', 'ru', 'zh'],
    'yii2.ulrManager.class' => null,
];
