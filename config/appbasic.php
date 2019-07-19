<?php

/**
 * Params application basic configuration
 */

require_once './vendor/yiisoft/yii2/Yii.php';

return [
    // app basic web applications options
    'app.basic.alias.path.bower' => '@root/node_modules',
    'app.basic.alias.path.npm' => '@root/node_modules',
    'app.basic.alias.path.public' => '@root/public',
    'app.basic.alias.path.runtime' => '@root/public/@runtime',
    'app.basic.base.path' => '@vendor/terabytesoftw/app-basic/src',
    'app.basic.bootstrap' => ['log'],
    'app.basic.controller.namespace' => 'terabytesoft\app\basic\controllers',
    'app.basic.footer.autor' => '©' . date('Y') . '. ' . \Yii::t('app.basic', 'TerabyteSoft SA - Wilmer Arambula.'),
    'app.basic.id' => 'app.basic',
    'app.basic.language' => 'en-US',
    'app.basic.name' => 'My Project Basic',
    'app.basic.vendor.path' => '@root/vendor',

    // menu default without extension ['terabytesoftw/app-user']
    'app.basic.menu.isguest' => [
        [
            'label' => \Yii::t('app.basic', 'About'),
            'url' => ['/site/about']
        ],
        [
            'label' => \Yii::t('app.basic', 'Contact'),
            'url' => ['/site/contact']
        ],
    ],

    // menu default with extension ['terabytesoftw/app-user']
    'app.basic.setting.menu.user.isguest' => [
        [
            'label' => \Yii::t('app.basic', 'Sign up'),
            'url' => ['/user/registration/register'],
        ],
        [
            'label' => \Yii::t('app.basic', 'Login'),
            'url' => ['/user/security/login']
        ],
    ],
    'app.basic.setting.menu.user.logged' => [
        [
            'label' =>  \Yii::t('app.basic', 'Manage Users'),
            'url' => ['/user/admin/index'],
        ],
        [
            'label' =>  \Yii::t('app.basic', 'Settings Account'),
            'url' => ['/user/settings/account'],
        ],
        [
            'label' =>  \Yii::t('app.basic', 'Settings Profile'),
            'url' => ['/user/settings/profile'],
        ],
        [
            'label' =>  \Yii::t('app.basic', 'Logout'),
            'url' => ['/user/security/logout'],
            'linkOptions' => ['data-method' => 'POST'],
        ],
    ],

    // component assetmanager
    'app.basic.assetmanager.base.path' => '@public/assets',

    // component errorHandler
    'app.basic.errorhandler.erroraction' => 'site/error',

    // component log
    'app.basic.log.levels' => ['error', 'warning', 'info'],
    'app.basic.log.logFile' => '@runtime/logs/app.log',

    // component mailer
    'app.basic.mailer.usefiletransport' => true,

    // component request
    'app.basic.request.cookievalidationkey' => 'testme-codeception',
    'app.basic.request.enablecsrfvalidation' => true,

    // component urlmanager
    'app.basic.urlmanager.enableprettyurl' => true,
    'app.basic.urlmanager.showscriptname' => true,
];
