<p align="center">
    <a href="https://github.com/yii2-extensions/localeurls" target="_blank">
        <img src="https://www.yiiframework.com/image/yii_logo_light.svg" alt="Yii Framework">
    </a>
    <h1 align="center">Web Application Basic</h1>
</p>

<p align="center">
    <a href="docker-compose.roadrunner.yml" target="_blank">
        <img src="https://img.shields.io/badge/roadrunner-%23FF6B35.svg?label=stack&logo=data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEyIDJMMjIgMTJMMTIgMjJMMiAxMkwxMiAyWiIgZmlsbD0iI0ZGNkIzNSIvPgo8cGF0aCBkPSJNMTIgNkwxOCAxMkwxMiAxOEw2IDEyTDEyIDZaIiBmaWxsPSIjRkZGRkZGIi8+CjxwYXRoIGQ9Ik0xMiA5TDE1IDEyTDEyIDE1TDkgMTJMMTIgOVoiIGZpbGw9IiNGRjZCMzUiLz4KPC9zdmc+&logoColor=white" alt="roadrunner-badge">
    </a>
    <a href="https://www.php.net/releases/8.1/en.php" target="_blank">
        <img src="https://img.shields.io/badge/PHP-%3E%3D8.1-787CB5" alt="php-version">
    </a>
    <a href="https://github.com/yiisoft/yii2/tree/2.0.53" target="_blank">
        <img src="https://img.shields.io/badge/Yii2%20-2.0.53-blue" alt="Yii2 2.0.53">
    </a>
    <a href="https://github.com/yiisoft/yii2/tree/22.0" target="_blank">
        <img src="https://img.shields.io/badge/Yii2%20-22-blue" alt="Yii2 22.0">
    </a>
    <a href="https://github.com/yii2-extensions/app-basic/actions/workflows/build.yml" target="_blank">
        <img src="https://github.com/yii2-extensions/app-basic/actions/workflows/build.yml/badge.svg" alt="PHPUnit">
    </a>
    <a href="https://github.com/yii2-extensions/app-basic/actions/workflows/static.yml" target="_blank">
        <img src="https://github.com/yii2-extensions/app-basic/actions/workflows/static.yml/badge.svg" alt="PHPStan">
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
- ✅ **SSL Support** - Configured for secure HTTPS connections with SSL (mkcert).
- ✅ **Testing Ready** - Codeception test suite with examples for functional and unit testing.

## Quick start

### How it works

The Yii2 Web Application Basic template provides a complete foundation for building modern web applications. Unlike starting from scratch, this template includes.

1. **Pre-configured structure** with organized directories for assets, views, models, and controllers.
2. **Bootstrap 5 integration** for responsive, mobile-first user interfaces.
3. **Security features** including CSRF protection and input validation.
4. **Development tools** for debugging, logging, and testing.

#### Why use this template

- **Rapid development**: Start building features immediately without setup overhead.
- **Best practices**: Follow Yii2 conventions and modern web development standards.
- **Extensible**: Easy to customize and extend for specific project requirements.
- **Production-ready**: Includes security features and optimizations for deployment.

>Note: Also, make sure to install [`npm`](https://nodejs.org/en/download/) for frontend dependency management.

### Installation

**Quick start**

```bash
composer create-project --prefer-dist --stability=dev yii2-extensions/app-basic myapp
cd myapp
```

**Start development server**

```bash
# Using built-in PHP server
php -S localhost:8080 -t web

# Or using Yii console command
./yii serve
```

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
│   │   ├── event/         Event handlers
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

class SiteController extends Controller
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

[![Latest Stable Version](https://poser.pugx.org/yii2-extensions/app-basic/v)](https://packagist.org/packages/yii2-extensions/app-basic)
[![Total Downloads](https://poser.pugx.org/yii2-extensions/app-basic/downloads)](https://packagist.org/packages/yii2-extensions/app-basic)
[![phpstan-level](https://img.shields.io/badge/PHPStan%20level-max-blue)](https://github.com/yii2-extensions/app-basic/actions/workflows/static.yml)
[![StyleCI](https://github.styleci.io/repos/698621511/shield?branch=main)](https://github.styleci.io/repos/698621511?branch=main)

## Documentation

For detailed configuration options and advanced usage:

- 📚 [Installation Guide](docs/installation.md)
- ⚙️ [Configuration Reference](docs/configuration.md) 
- 🧪 [Testing Guide](docs/testing.md)

## Screenshots

The web application includes these ready-to-use pages:

- **[404 Error Page](docs/images/404.png)** - Custom error handling
- **[404 Error Page Dark](docs/images/404-dark.png)** - Custom error handling

## Our social networks

[![X](https://img.shields.io/badge/follow-@terabytesoftw-1DA1F2?logo=x&logoColor=1DA1F2&labelColor=555555&style=flat)](https://x.com/Terabytesoftw)

## License

[![License](https://img.shields.io/github/license/yii2-extensions/app-basic)](LICENSE.md)
