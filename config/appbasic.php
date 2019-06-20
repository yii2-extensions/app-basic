<?php

require_once dirname(__DIR__, 1). '/vendor/yiisoft/yii2/Yii.php';

return [
    //app basic options
    'app.basic.autor' => '©'.date('Y').'. '.Yii::t('AppBasic', 'TerabyteSoft SA - Wilmer Arambula.'),
    'app.basic.cookie.validation.key' => 'testme',
    'app.basic.db.class' => 'yii\db\Connection',
    'app.basic.db.dns' => 'mysql:host=localhost;dbname=appbasic',
    'app.basic.db.username' => 'root',
    'app.basic.db.password' => '1234',
    'app.basic.db.charset' => 'utf8',
    'app.basic.error.view.pathmap' => '@TerabyteSoft/App/Basic/Views/Site/Error.php',
    'app.basic.captcha.fixedVerifyCode' => 'TestMe',
    'app.basic.email' => 'admin@appbasic.com',
    'app.basic.id' => 'basic',
    'app.basic.name' => 'My Project Basic',
    'app.basic.layout' => 'Main.php',
    'app.basic.menu.isguest' => [
        [
            'label' => Yii::t('AppBasic', 'About'),
            'url' => ['/site/about']
        ],
        [
            'label' => Yii::t('AppBasic', 'Contact'),
            'url' => ['/site/contact']
        ],
    ],
    'app.basic.menu.logged' => [
    ],
    'app.basic.theme.pathmap.layout' => '@TerabyteSoft/App/Basic/Views/Layouts',
    'app.basic.theme.pathmap.site' => '@TerabyteSoft/App/Basic/Views/Site',
    'app.basic.translator.basePath' => '@TerabyteSoft/App/Basic/messages',
    'app.basic.translator.sourceLanguage' => 'en',
];
