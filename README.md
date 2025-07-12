<p align="center">
    <a href="https://github.com/yii2-extensions/localeurls" target="_blank">
        <img src="https://www.yiiframework.com/image/yii_logo_light.svg" alt="Yii Framework">
    </a>
    <h1 align="center">Web Application Basic</h1>
</p>

<p align="center">
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

![app-basic](docs/home.png)

## Features

- ✅ **Asset Management** - Optimized asset bundles for CSS, JS, and resource management.
- ✅ **Clean Architecture** - Well-organized directory structure following Yii2 best practices.
- ✅ **Console Commands** - Example console commands for background tasks and maintenance.
- ✅ **Contact Form** - Fully functional contact form with validation and email sending.
- ✅ **Developer Tools** - Debugging tools, logging, and development-friendly configurations.
- ✅ **Modern Bootstrap 5 UI** - Responsive, mobile-first design with latest Bootstrap components.
- ✅ **Multi-language Support** - Built-in internationalization (i18n) support with message translations.
- ✅ **Ready-to-Use Pages** - Pre-built pages including home, about, contact, and error handling.
- ✅ **Security Features** - Built-in CSRF protection, input validation, and secure configurations.
- ✅ **SSL Support** - Configured for secure HTTPS connections with SSL (mkcert).
- ✅ **Testing Ready** - Codeception test suite with examples for functional and unit testing.

## Supported web servers

[![Apache](https://img.shields.io/badge/apache-%23D42029.svg?style=for-the-badge&label=docker&logo=apache&logoColor=white)](docker-compose.yml)
[![Caddy](https://img.shields.io/badge/caddy-%231F88C0.svg?style=for-the-badge&label=docker&logo=caddy&logoColor=white)](docker-compose.caddy.yml)
[![FrankenPHP](https://img.shields.io/badge/frankenphp-%23FF6B35.svg?style=for-the-badge&label=docker&logo=php&logoColor=white)](docker-compose.frankenphp.yml)
[![Nginx](https://img.shields.io/badge/nginx-%23009639.svg?style=for-the-badge&label=docker&logo=nginx&logoColor=white)](docker-compose.nginx.yml)

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

### Installation

**Quick start**

```bash
composer create-project --prefer-dist --stability=dev yii2-extensions/app-basic myapp
cd myapp
```

**Start development server**

```bash
# Using built-in PHP server
php -S localhost:8080 -t public

# Or using Yii console command
./yii serve
```

**Start Apache or Nginx server**

```bash
# For Apache
docker-compose up -d

# For Caddy
docker-compose -f docker-compose.caddy.yml up -d

# For FrankenPHP
docker-compose -f docker-compose.frankenphp.yml up -d

# For Nginx
docker-compose -f docker-compose.nginx.yml up -d 
```

### Access your application

After starting the server, you can access your application in your web browser.

```bash
# For built-in PHP server
http://localhost:8080/

# For Apache
https://localhost:8443/

# For Caddy
https://localhost:8444/

# For FrankenPHP
https://localhost:8445/

# For Nginx
https://localhost:8446/
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
├── docker/                Docker configuration files
│   ├── apache/            Apache configuration
│   ├── caddy/             Caddy configuration
│   ├── frankenphp/        FrankenPHP configuration
│   ├── nginx/             Nginx configuration
│   ├── php/               PHP configuration
│   ├── ssl/               SSL certificates
│   └── supervisor/        Supervisor configuration
├── src/
│   ├── framework/         Framework assets & resources
│   │   ├── asset/         Asset bundles
│   │   ├── event/         Event handlers
│   │   └── resource/      CSS, JS, layouts, messages
│   └── usecase/           Application use cases
│       ├── contact/       Contact functionality
│       ├── hello/         Console command example
│       ├── security/      Security features
│       └── site/          Site pages
├── tests/                 Test suites
├── vendor/                Composer dependencies
└── public/                Web server document root
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
    
    public function actionAbout(): string
    {
        return $this->render('about');
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
[![codecov](https://codecov.io/github/yii2-extensions/app-basic/graph/badge.svg?token=zcXbeTspxy)](https://codecov.io/github/yii2-extensions/app-basic)
[![phpstan-level](https://img.shields.io/badge/PHPStan%20level-max-blue)](https://github.com/yii2-extensions/app-basic/actions/workflows/static.yml)
[![StyleCI](https://github.styleci.io/repos/698621511/shield?branch=main)](https://github.styleci.io/repos/698621511?branch=main)

## Documentation

For detailed configuration options and advanced usage:

- 📚 [Installation Guide](docs/installation.md)
- ⚙️ [Configuration Reference](docs/configuration.md) 
- 🧪 [Testing Guide](docs/testing.md)

## Screenshots

The web application includes these ready-to-use pages:

- **[Home Page](docs/home.png)** - Welcome page with navigation
- **[About Page](docs/about.png)** - Information about your application  
- **[Contact Page](docs/contact.png)** - Contact form with validation
- **[404 Error Page](docs/404.png)** - Custom error handling

## Our social networks

[![X](https://img.shields.io/badge/follow-@terabytesoftw-1DA1F2?logo=x&logoColor=1DA1F2&labelColor=555555&style=flat)](https://x.com/Terabytesoftw)

## License

[![License](https://poser.pugx.org/yii2-extensions/app-basic/license)](LICENSE.md)
