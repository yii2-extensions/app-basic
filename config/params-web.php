<?php

declare(strict_types=1);

use App\UseCase\Contact\ContactController;
use App\UseCase\Site\SiteController;

return [
    // web application settings shared
    'common.aliases' => [
        '@npm' => '@app/node_modules',
        '@public' => '@app/public',
        '@web' => '@public',
        '@runtime' => '@public/runtime',
    ],
    'web.assetManager.basePath' => '@public/assets',
    'web.controllerMap' => [
        'contact' => [
            'class' => ContactController::class,
        ],
        'site' => [
            'class' => SiteController::class,
        ],
    ],
    'web.errorHandler.errorAction' => 'site/404',
    'web.id' => 'web.basic',
    'web.language' => 'en-US',
    'web.name' => 'Web application basic',
    'web.params' => [
        'app.localeurls.languages' => [
            'de' => 'de-DE',
            'en' => 'en-US',
            'es' => 'es-ES',
            'fr' => 'fr-FR',
            'pt' => 'pt-BR',
            'ru' => 'ru-RU',
            'zh' => 'zh-CN',
        ],
        'app.mailer.sender' => 'noreply@example.com',
        'app.mailer.sender.name' => 'Web application basic',
        'app.menu.isguest' => [
            [
                'label' => 'Home',
                'link' => ['/site/index'],
                'order' => 0,
                'category' => 'app.basic',
            ],
            [
                'label' => 'About',
                'link' => ['/site/about'],
                'order' => 1,
                'category' => 'app.basic',
            ],
            [
                'label' => 'Contact',
                'link' => ['/contact/index'],
                'order' => 2,
                'category' => 'app.basic',
            ],
        ],
        'app.menu.islogged' => [],
        'icons' => '@npm/@fortawesome/fontawesome-free/svgs/{family}/{name}.sv',
    ],
    'web.request.cookieValidationKey' => 'your-cookie-validation-key',
    'web.request.enableCsrfValidation' => true,
    'web.urlManager.enablePrettyUrl' => true,
    'web.urlManager.showScriptName' => false,

    // yii2 extensions settings
    'yii2.debug' => false,
    'yii2.gii' => false,
    'yii2.localeurls.languages' => [
        'de' => 'de-DE',
        'en' => 'en-US',
        'es' => 'es-ES',
        'fr' => 'fr-FR',
        'pt' => 'pt-BR',
        'ru' => 'ru-RU',
        'zh' => 'zh-CN',
    ],
    'yii2.ulrManager.class' => null,
];
