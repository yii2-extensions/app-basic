### **Example: appbasic.php**

```
/** app basic autorname **/
'app.basic.autor' => '©'.date('Y').'. '.Yii::t('AppBasic', 'TerabyteSoft SA - Wilmer Arambula.'),

/** app basic error view path **/
'app.basic.error.view.pathmap' => '@TerabyteSoft/App/Basic/Views/Site/Error.php',

/** app basic captcha code bug:https://github.com/yiisoft/yii-captcha/issues/15 **/
'app.basic.captcha.fixedVerifyCode' => 'TestMe',

/** app basic application email **/
'app.basic.email' => 'admin@appbasic.com',

/** app basic application id **/
'app.basic.id' => 'AppBasic',

/** app basic application name **/
'app.basic.name' => 'My Project Basic',

/** app basic layout theme **/
'app.basic.layout' => 'Main.php',

/** app basic menu user is guest only https://github.com/terabytesoft/app-basic **/
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

/** app basic menu user is user logged only https://github.com/terabytesoft/app-basic **/
'app.basic.menu.logged' => [
],

/** app basic menu user is guest install before https://github.com/terabytesoft/app-user **/
'app.basic.menu.isguest' => [
    [
        'label' => Yii::t('AppBasic', 'About'),
        'url' => ['/site/about']
    ],
    [
        'label' => Yii::t('AppBasic', 'Contact'),
        'url' => ['/site/contact']
    ],
    [
        'label' => Yii::t('ModuleUser', 'Sign up'),
        'url' => ['/user/registration/register'],
    ],
    [
        'label' => Yii::t('ModuleUser', 'Login'),
        'url' => ['/user/security/login']
    ],
],

/** app basic menu user is logged, install before https://github.com/terabytesoft/app-user **/
'app.basic.menu.logged' => [
    [
        'label' => Yii::t('ModuleUser', 'Manage Users'),
        'url' => ['/user/admin/index'],
    ],
    [
        'label' => Yii::t('ModuleUser', 'Settings Account'),
        'url' => ['/user/settings/account'],
    ],
    [
        'label' => Yii::t('ModuleUser', 'Settings Profile'),
        'url' => ['/user/settings/profile'],
    ],
    [
        'label' => Yii::t('ModuleUser', 'Logout'),
        'url' => ['/user/security/logout'],
        'linkOptions' => ['data-method' => 'POST'],
    ],
],

/** app basic theme pathmap **/
'app.basic.theme.pathmap.layout' => '@TerabyteSoft/App/Basic/Views/Layouts',
'app.basic.theme.pathmap.site' => '@TerabyteSoft/App/Basic/Views/Site',

/** app basic config translator **/
'app.basic.translator.basePath' => '@TerabyteSoft/App/Basic/Messages',
'app.basic.translator.sourceLanguage' => 'en',
```
