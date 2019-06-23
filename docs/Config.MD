### **Example: appbasic.php**

```
// alias path web application
'app.basic.alias.path.bower'   => '@root/node_modules',
'app.basic.alias.path.npm'     => '@root/node_modules',
'app.basic.alias.path.public'  => '@root/tests/public',
'app.basic.alias.path.runtime' => '@root/tests/public/@runtime',

// alias path tests codeception
'app.basic.alias.path.terabytesoft.test' => '@root/tests',

// base path web application
'app.basic.base.path' => '@root/src',

// boostrap config
'app.basic.bootstrap' => ['log'],

// controller namespaces web application
'app.basic.controller.namespace' => 'terabytesoft\app\basic\controllers',

// email sender form contact
'app.basic.email.admin'      => 'noreply@example.com',
'app.basic.email.sendername' => 'appbasic mailer example',

// footer text autor
'app.basic.footer.autor' => '©'.date('Y').'. '.\Yii::t('AppBasic', 'TerabyteSoft SA - Wilmer Arambula.'),

// web application id, language, name
'app.basic.id'       => 'basic',
'app.basic.language' => 'en-US',
'app.basic.name'     => 'My Project Basic',

// menu simple web application user guest
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

// menu web application + module user admin
'app.basic.menu.logged' => [],

// vendor path
'app.basic.vendor.path' => '@root/vendor',

// component assetmanager
'app.basic.assetmanager.base.path' => '@public/assets',

// component log
'app.basic.log.levels'  => ['error', 'warning', 'info'],
'app.basic.log.logFile' => '@runtime/logs/app.log',

// component mailer
'app.basic.mailer.usefiletransport' => true,

// component request
'app.basic.request.cookievalidationkey'  => 'testme-codeception',
'app.basic.request.enablecsrfvalidation' => true,

// component urlmanager
'app.basic.urlmanager.enableprettyurl' => true,
'app.basic.urlmanager.showscriptname'  => true,
```
