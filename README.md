<p align="center">
    <a href="https://github.com/yii2-extensions/app-basic" target="_blank">
        <img src="https://www.yiiframework.com/image/yii_logo_light.svg" alt="Yii Framework">
    </a>
    <h1 align="center">Web Application Basic</h1>
</p>

<p align="center">
    <a href="https://packagist.org/packages/yii2-extensions/app-basic" target="_blank">
        <img src="https://img.shields.io/packagist/v/yii2-extensions/app-basic.svg?style=for-the-badge&logo=packagist&logoColor=white&label=Stable" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/yii2-extensions/app-basic" target="_blank">
        <img src="https://img.shields.io/packagist/dt/yii2-extensions/app-basic.svg?style=for-the-badge&logo=packagist&logoColor=white&label=Downloads" alt="Total Downloads">
    </a>    
    <a href="https://www.php.net/releases/8.1/en.php" target="_blank">
        <img src="https://img.shields.io/badge/%3E%3D8.1-777BB4.svg?style=for-the-badge&logo=php&logoColor=white" alt="PHP version">
    </a>
    <a href="https://github.com/yiisoft/yii2/tree/2.0.53" target="_blank">
        <img src="https://img.shields.io/badge/2.0.x-0073AA.svg?style=for-the-badge&logo=yii&logoColor=white" alt="Yii 2.0.x">
    </a>
    <a href="https://github.com/yiisoft/yii2/tree/22.0" target="_blank">
        <img src="https://img.shields.io/badge/22.0.x-0073AA.svg?style=for-the-badge&logo=yii&logoColor=white" alt="Yii 22.0.x">
    </a>
    <a href="https://github.com/yii2-extensions/app-basic/actions/workflows/build.yml" target="_blank">
        <img src="https://img.shields.io/github/actions/workflow/status/yii2-extensions/app-basic/build.yml?branch=main&style=for-the-badge&label=PHPUnit" alt="PHPUnit">
    </a>
    <a href="https://github.com/yii2-extensions/app-basic/actions/workflows/static.yml" target="_blank">
        <img src="https://img.shields.io/github/actions/workflow/status/yii2-extensions/app-basic/static.yml?branch=main&style=for-the-badge&label=PHPStan" alt="PHPStan">
    </a>
</p>

A modern, Bootstrap 5-powered Yii2 application template designed for rapid web-application development. Built with best practices, clean architecture, and developer-friendly configuration, it lets you create production-ready apps with minimal setup while maintaining code quality and extensibility.

<picture>
    <source media="(prefers-color-scheme: dark)" srcset="docs/images/home-dark.png">
    <source media="(prefers-color-scheme: light)" srcset="docs/images/home.png">
    <img src="docs/images/home.png" alt="Web Application Basic">
</picture>

## Features

- ✅ **Asset Management** - Optimized asset bundles for CSS, JS, and resource management.
- ✅ **Clean Architecture** - Well-organized directory structure following Yii2 best practices.
- ✅ **Console Commands** - Example console commands for background tasks and maintenance.
- ✅ **Developer Tools** - Debugging tools, logging, and development-friendly configurations.
- ✅ **Modern Bootstrap 5 UI** - Responsive, mobile-first design with latest Bootstrap components.
- ✅ **Testing Ready** - Codeception test suite with examples for functional and unit testing.

## Available stacks

[![FrankenPHP](https://img.shields.io/badge/Dev-frankenphp-blue?style=for-the-badge&logo=php&logoColor=white)](https://github.com/yii2-extensions/app-basic/tree/franken-php)
[![RoadRunner Worker](https://img.shields.io/badge/road%20runner-%23FF6B35.svg?style=for-the-badge&label=worker&logo=data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEyIDJMMjIgMTJMMTIgMjJMMiAxMkwxMiAyWiIgZmlsbD0iI0ZGNkIzNSIvPgo8cGF0aCBkPSJNMTIgNkwxOCAxMkwxMiAxOEw2IDEyTDEyIDZaIiBmaWxsPSIjRkZGRkZGIi8+CjxwYXRoIGQ9Ik0xMiA5TDE1IDEyTDEyIDE1TDkgMTJMMTIgOVoiIGZpbGw9IiNGRjZCMzUiLz4KPC9zdmc+&logoColor=white)](https://github.com/yii2-extensions/app-basic/tree/road-runner)

For setup instructions, see README in each branch.

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

>Note: Also, make sure to install [`npm`](https://nodejs.org/en/download/) for frontend dependency management.

### Installation

```bash
composer create-project --prefer-dist yii2-extensions/app-basic app-basic:^0.1
cd app-basic
```

### Quick start

Start development server

```bash
# Using built-in PHP server
php -S localhost:8080 -t web

# Or using Yii console command
./yii serve
```

> Your application will be available at `http://localhost:8080` or at the address set in `--address` option.

### Basic usage

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
## Quality code

[![Codecov](https://img.shields.io/codecov/c/github/yii2-extensions/app-basic.svg?branch=main&style=for-the-badge&logo=codecov&logoColor=white&label=Coverage)](https://codecov.io/github/yii2-extensions/app-basic)
[![PHPStan Level Max](https://img.shields.io/badge/PHPStan-Level%20Max-4F5D95.svg?style=for-the-badge&logo=php&logoColor=white)](https://github.com/yii2-extensions/app-basic/actions/workflows/static.yml)
[![StyleCI](https://img.shields.io/badge/StyleCI-Passed-44CC11.svg?style=for-the-badge&logo=styleci&logoColor=white)](https://github.styleci.io/repos/165419144?branch=main)

## Documentation

For detailed configuration options and advanced usage:

- 📚 [Installation Guide](docs/installation.md)
- ⚙️ [Configuration Reference](docs/configuration.md) 
- 🧪 [Testing Guide](docs/testing.md)
- 📸 [Screenshots](docs/screenshots.md)

## Our social networks

[![Follow on X](https://img.shields.io/badge/-Follow%20on%20X-1DA1F2.svg?style=for-the-badge&logo=x&logoColor=white&labelColor=000000)](https://x.com/Terabytesoftw)

## License

[![License](https://img.shields.io/github/license/yii2-extensions/app-basic?style=for-the-badge&logo=opensourceinitiative&logoColor=white&labelColor=333333)](LICENSE.md)
