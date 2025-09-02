# Configuration reference

## Overview

This guide covers all configuration options for the Yii2 Web Application Basic template, from basic setup to advanced 
customization for production environments.

## Configuration structure

### Configuration files overview

```text
config/
├── common/
│   └── components.php     # Shared components
├── console/
│   └── app.php            # Console application config
├── web/
│   ├── app.php            # Web application config
│   ├── components.php     # Web-specific components
│   └── modules.php        # Module configurations
├── messages.php           # Translation configuration
├── params-console.php     # Console parameters
└── params-web.php         # Web parameters
```

### Configuration hierarchy

Configuration follows this loading order.

1. **Common configuration** - Shared between web and console.
2. **Console application configuration** - Specific to the console application.
3. **Web application configuration** - Specific to the web application.

## Basic configuration

### Common configuration

Components configuration in `config/common/components.php`.

```php
<?php

declare(strict_types=1);

use yii\caching\FileCache;
use yii\log\FileTarget;
use yii\symfonymailer\Mailer;

return [
    'cache' => [
        'class' => FileCache::class,
    ],
    'log' => [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'targets' => [
            [
                'class' => FileTarget::class,
                'levels' => [
                    'error',
                    'info',
                    'warning',
                ],
                'logFile' => '@runtime/logs/app.log',
            ],
        ],
    ],
    'mailer' => [
        'class' => Mailer::class,
        'useFileTransport' => true,
    ],
];
```

### Console application configuration

Application configuration in `config/console/app.php`.

```php
<?php

declare(strict_types=1);

use app\usecase\hello\HelloController;

/** @var string[] $components */
$components = require dirname(__DIR__) . '/common/components.php';

/** @var string[] $params */
$params = require dirname(__DIR__) . '/params-console.php';

return [
    'id' => 'console.basic',
    'basePath' => dirname(__DIR__, 2),
    'bootstrap' => ['log'],
    'components' => $components,
    'controllerMap' => ['hello' => HelloController::class],
    'params' => $params,
];
```

### Web application configuration

Application configuration in `config/web/app.php`.

```php
<?php

declare(strict_types=1);

use app\usecase\site\SiteController;

/** @phpstan-var string[] $components */
$components = require __DIR__ . '/components.php';

/** @phpstan-var string[] $modules */
$modules = require __DIR__ . '/modules.php';

/** @phpstan-var string[] $params */
$params = require dirname(__DIR__) . '/params-web.php';
$rootDir = dirname(__DIR__, 2);

return [
    'id' => 'web.basic',
    'aliases' => [
        '@root' => $rootDir,
        '@npm' => '@root/node_modules',
        '@bower' => '@npm',
        '@resource' => '@root/src/framework/resource',
        '@runtime' => '@root/runtime',
    ],
    'basePath' => $rootDir,
    'bootstrap' => ['log'],
    'components' => $components,
    'controllerMap' => [
        'site' => ['class' => SiteController::class],
    ],
    'language' => 'en-US',
    'modules' => $modules,
    'name' => 'Web application basic',
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['bootstrap'][] = 'gii';
}

return $config;
```

Components configuration in `config/web/components.php`.

```php
<?php

declare(strict_types=1);

use yii\i18n\PhpMessageSource;

/** @phpstan-var string[] $commonComponents */
$commonComponents = require dirname(__DIR__) . '/common/components.php';

$config = [
    'assetManager' => [
        'basePath' => '@root/web/assets',
    ],
    'errorHandler' => [
        'errorAction' => 'site/404',
    ],
    'i18n' => [
        'translations' => [
            'app.basic' => [
                'class' => PhpMessageSource::class,
            ],
        ],
    ],
    'request' => [
        'cookieValidationKey' => 'your-cookie-validation-key',
        'enableCsrfValidation' => YII_ENV_DEV === false,
    ],
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
    ],
];

$config += $commonComponents;

return $config;
```

Modules configuration in `config/web/modules.php`.

```php
<?php

declare(strict_types=1);

use yii\gii\Module;
use yii2\extensions\debug\WorkerDebugModule;

$config = [
    'debug' => [
        'class' => WorkerDebugModule::class,
        // development only: allows all IPs.
        // for production, replace '*' with explicit trusted IPs (for example, ['127.0.0.1', '::1']).
        'allowedIPs' => ['*'],
    ],
    'gii' => [
        'class' => Module::class,
        // development only: allows all IPs.
        // for production, replace '*' with explicit trusted IPs (for example, ['127.0.0.1', '::1']).
        'allowedIPs' => ['*'],
    ],
];

return YII_ENV_DEV ? $config : [];
```

## Next steps

- 🧪 [Testing Guide](testing.md)
- 📚 [Installation Guide](installation.md)
