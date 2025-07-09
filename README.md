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

</br>

<p align="center">
Web Application Basic of Yii Version 2. <a href="http://www.yiiframework.com/" title="Yii Framework" target="_blank">Yii Framework</a> application best for rapidly creating projects with Bootstrap 5.
</p>

</br>

![app-basic](docs/home.png)

</br>

## Directory structure

```text
root
├── config                  
│   ├── common                              Common configuration.
│   │   └── components.php  
│   ├── console                             Console configuration.
│   │   └── app.php
│   ├── web                                 Web configuration.
│   │   ├── app.php
│   │   ├── components.php
│   │   └── modules.php 
│   ├── messages.php                        Translation configuration.
│   ├── params-console.php                  Console parameters.
│   └── params-web.php                      Web parameters.
├── src             
│   ├── framework 
│   │   ├── asset                           Asset bundle files.
│   │   ├── event                           Event handler files.
│   │   └── resource 
│   │       ├── css                         Css files.
│   │       ├── js                          Js files.
│   │       ├── layout                      Layout files.
│   │       ├── message                     Translation files.
│   │       └── ApplicationParameters.php   Configuration application parameters.
│   └── usecase
│       ├── contact                         Contact use case.
│       ├── hello                           Hello use case (console).
│       ├── security                        Security use case.
│       └── site                            Site use case.
├── tests                                   Tests codeception.
├── vendor                                  Composer dependencies.
└── public                                  Web server public.
```

## Features

The web application contains:

- [x] Pages - [Screenshots]:
    - [about](docs/about.png)
    - [contact](docs/contact.png)
    - [404](docs/404.png)

<p align="justify">
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.
</P>

## Installation

<p align="justify">
If you do not have <a href="http://getcomposer.org/" title="Composer" target="_blank">Composer</a>, you may install it by following the instructions at <a href="http://getcomposer.org/doc/00-intro.md#installation-nix" title="getcomposer.org" target="_blank">getcomposer.org</a>.
</p>

You can then install this project app-basic using the following command:

```shell
composer create-project --prefer-dist --stability=dev yii2-extensions/app-basic myapp
```

<p align="justify">
Now you should be able to access the application through the following URL, assuming `public` is the directory
directly under the Web root.
</p>

__*Virtual Host:*__

```
http://localhost:8080/
```

__*Server Yii:*__

```shell
./yii serve
```

__Console commands:__

```shell
./yii hello/index
```

## Generate translations

<p align="justify">
To generate the Yii Web Application Basic translations, you can change the language settings in the configuration file.
<p>

```
config/messages.php
```

<p align="justify">
 Automatically the generator will create the folder of your language in `src/Framework/resource/message`,
 If any translation is needed, you can open an issue to add it.
</p>

Root directory

```
./yii message config/messages.php
```

## Quality code

[![Latest Stable Version](https://poser.pugx.org/yii2-extensions/app-basic/v)](https://packagist.org/packages/yii2-extensions/app-basic)
[![Total Downloads](https://poser.pugx.org/yii2-extensions/app-basic/downloads)](https://packagist.org/packages/yii2-extensions/app-basic)
[![codecov](https://codecov.io/github/yii2-extensions/app-basic/graph/badge.svg?token=zcXbeTspxy)](https://codecov.io/github/yii2-extensions/app-basic)
[![phpstan-level](https://img.shields.io/badge/PHPStan%20level-max-blue)](https://github.com/yii2-extensions/app-basic/actions/workflows/static.yml)
[![StyleCI](https://github.styleci.io/repos/698621511/shield?branch=main)](https://github.styleci.io/repos/698621511?branch=main)

## Tests

~~~
// download all composer dependencies root project
$ composer update --prefer-dist -vvv

// run all tests with code coverage
$ vendor/bin/codecept run --coverage-xml
~~~

## Our social networks

[![X](https://img.shields.io/badge/follow-@terabytesoftw-1DA1F2?logo=x&logoColor=1DA1F2&labelColor=555555&style=flat)](https://x.com/Terabytesoftw)

## License

[![License](https://poser.pugx.org/yii2-extensions/app-basic/license)](LICENSE.md)
