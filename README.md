<!-- markdownlint-disable MD041 -->
<p align="center">
    <picture>
        <source media="(prefers-color-scheme: dark)" srcset="https://www.yiiframework.com/image/design/logo/yii3_full_for_dark.svg">
        <source media="(prefers-color-scheme: light)" srcset="https://www.yiiframework.com/image/design/logo/yii3_full_for_light.svg">
        <img src="https://www.yiiframework.com/image/design/logo/yii3_full_for_dark.svg" alt="Yii Framework" width="80%">
    </picture>
    <h1 align="center">Web Application Basic</h1>
    <br>
</p>
<!-- markdownlint-enable MD041 -->

<p align="center">
    <a href="https://www.php.net/releases/8.1/en.php" target="_blank">
        <img src="https://img.shields.io/badge/%3E%3D8.1-777BB4.svg?style=for-the-badge&logo=php&logoColor=white" alt="PHP version">
    </a>
    <a href="https://github.com/yiisoft/yii2/tree/2.0.53" target="_blank">
        <img src="https://img.shields.io/badge/2.0.x-0073AA.svg?style=for-the-badge&logo=yii&logoColor=white" alt="Yii 2.0.x">
    </a>
    <a href="https://github.com/yiisoft/yii2/tree/22.0" target="_blank">
        <img src="https://img.shields.io/badge/22.0.x-0073AA.svg?style=for-the-badge&logo=yii&logoColor=white" alt="Yii 22.0.x">
    </a>
    <a href="https://github.com/yii2-extensions/app-basic/actions/workflows/build.yml?query=branch%3Anginx" target="_blank">
        <img src="https://img.shields.io/github/actions/workflow/status/yii2-extensions/app-basic/build.yml?branch=nginx&style=for-the-badge&label=Codeception" alt="Codeception">
    </a>
    <a href="https://github.com/yii2-extensions/app-basic/actions/workflows/static.yml?query=branch%3Anginx" target="_blank">
        <img src="https://img.shields.io/github/actions/workflow/status/yii2-extensions/app-basic/static.yml?branch=nginx&style=for-the-badge&label=PHPStan" alt="PHPStan">
    </a>
</p>

<p align="center">
    <strong>A modern, Bootstrap 5-powered Yii2 application template for rapid development</strong><br>
    <em>Clean architecture, production-ready features, and developer-friendly configuration</em>
</p>

<picture>
    <source media="(prefers-color-scheme: dark)" srcset="docs/images/home-dark.png">
    <source media="(prefers-color-scheme: light)" srcset="docs/images/home.png">
    <img src="docs/images/home.png" alt="Web Application Basic">
</picture>

## Features

<picture>
    <source media="(min-width: 768px)" srcset="./docs/svgs/features.svg">
    <img src="./docs/svgs/features-mobile.svg" alt="Feature Overview" style="width: 100%;">
</picture>

## How it works

The Yii2 Web Application Basic template provides a complete foundation for building modern web applications. Unlike starting from scratch, this template includes.

1. **Pre-configured structure** with organized directories for assets, views, models, and controllers.
2. **Bootstrap 5 integration** for responsive, mobile-first user interfaces.
3. **Security features** including CSRF protection and input validation.
4. **Development tools** for debugging, logging, and testing.

**Why use this template**

- **Rapid development**: Start building features immediately without setup overhead.
- **Best practices**: Follow Yii2 conventions and modern web development standards.
- **Extensible**: Easy to customize and extend for specific project requirements.
- **Production-ready**: Includes security features and optimizations for deployment.

> [!NOTE]
> Also, make sure to install [`npm`](https://nodejs.org/en/download/) for frontend dependency management.

### Installation

```bash
composer create-project --prefer-dist yii2-extensions/app-basic:dev-nginx app-basic
cd app-basic
```

### Quick start

Start Nginx

```bash
docker-compose up -d
```

> Your application will be available at `https://localhost:8443`.

#### Directory structure

```text
root/
├── config/                Configuration files
│   ├── common/            Common configuration
│   ├── console/           Console configuration
│   ├── web/               Web configuration
│   └── messages.php       Translation config
├── src/
│   ├── framework/         Framework assets & resources
│   │   ├── asset/         Asset bundles
│   │   └── resource/      CSS, JS, layouts, messages
│   └── usecase/           Application use cases
│       ├── hello/         Console command example
│       └── site/          Site pages
├── tests/                 Test suites
├── vendor/                Composer dependencies
└── web/                   Web server document root
```

#### Creating your first page

```php
<?php
// src/usecase/site/SiteController.php

declare(strict_types=1);

namespace app\usecase\site;

use yii\web\Controller;

final class SiteController extends Controller
{
    public function actionIndex(): string
    {
        return $this->render('index');
    }
}
```

#### Console commands

```bash
# Run the hello command
./yii hello/index

# Generate translations
./yii message config/messages.php

# Clear cache
./yii cache/flush-all
```

## Package information

[![Development Status](https://img.shields.io/badge/Status-Dev-orange.svg?style=for-the-badge&logo=packagist&logoColor=white)](https://github.com/yii2-extensions/app-basic/tree/nginx)

## Quality code

[![Codecov](https://img.shields.io/codecov/c/github/yii2-extensions/app-basic.svg?branch=nginx&style=for-the-badge&logo=codecov&logoColor=white&label=Coverage)](https://codecov.io/github/yii2-extensions/app-basic)
[![PHPStan Level Max](https://img.shields.io/badge/PHPStan-Level%20Max-4F5D95.svg?style=for-the-badge&logo=php&logoColor=white)](https://github.com/yii2-extensions/app-basic/actions/workflows/static.yml?query=branch%3Anginx)
[![StyleCI](https://img.shields.io/badge/StyleCI-Passed-44CC11.svg?style=for-the-badge&logo=styleci&logoColor=white)](https://github.styleci.io/repos/165419144?branch=nginx)

## Documentation

For detailed configuration options and advanced usage:

- 📚 [Installation Guide](docs/installation.md)
- ⚙️ [Configuration Reference](docs/configuration.md)
- 🧪 [Testing Guide](docs/testing.md)
- 📸 [Screenshots](docs/screenshots.md)

## Our social networks

[![Follow on X](https://img.shields.io/badge/-Follow%20on%20X-1DA1F2.svg?style=for-the-badge&logo=x&logoColor=white&labelColor=000000)](https://x.com/Terabytesoftw)

## License

[![License](https://img.shields.io/badge/License-BSD--3--Clause-brightgreen.svg?style=for-the-badge&logo=opensourceinitiative&logoColor=white&labelColor=555555)](LICENSE)
