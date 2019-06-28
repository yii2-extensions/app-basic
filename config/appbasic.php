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
    'app.basic.alias.path.test.public' => '@root/tests/public',
    'app.basic.alias.path.test.runtime' => '@root/tests/public/@runtime',
    'app.basic.alias.path.terabytesoft.test' => '@root/tests',
    'app.basic.base.path' => '@root/src',
    'app.basic.bootstrap' => ['log'],
    'app.basic.controller.namespace' => 'terabytesoft\app\basic\controllers',
    'app.basic.email.admin' => 'noreply@example.com',
    'app.basic.email.sendername' => 'appbasic mailer example',
    'app.basic.footer.autor' => '©'.date('Y').'. '.\Yii::t('AppBasic', 'TerabyteSoft SA - Wilmer Arambula.'),
    'app.basic.id' => 'basic',
    'app.basic.language' => 'en-US',
    'app.basic.menu.isguest' => [
        [
            'label' => \Yii::t('AppBasic', 'About'),
            'url' => ['/site/about']
        ],
        [
            'label' => \Yii::t('AppBasic', 'Contact'),
            'url' => ['/site/contact']
        ],
    ],
    'app.basic.menu.logged' => [],
    'app.basic.name' => 'My Project Basic',
    'app.basic.vendor.path' => '@root/vendor',

    // component assetmanager
    'app.basic.assetmanager.base.path' => '@public/assets',

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
