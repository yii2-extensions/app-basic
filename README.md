<p align="center">
    <a href="https://github.com/terabytesoft/app-basic" target="_blank">
        <img src="https://lh3.googleusercontent.com/D9TFw1F6ddPuheDc_tpNptTdvTg-FNNpjLSBN14X6Sc-3JDiOxfE67rEh4OZfygonx1tKei2b2DEOHDLjF6T3xl8e-rkEEPZeGqLTWcS_v2cBRlyo0vcZLDHG5ivSDGIWCsenbol=w2400" height="50px;">
    </a>
    <h1 align="center">Web Application Basic</h1>
</p>

<p align="center">
    <a href="https://www.php.net/releases/8.1/en.php" target="_blank">
        <img src="https://img.shields.io/badge/PHP-%3E%3D8.1-787CB5" alt="php-version">
    </a>
    <a href="https://github.com/yiisoft/yii2/tree/2.2" target="_blank">
        <img src="https://img.shields.io/badge/yii2%20version-2.2-blue" alt="yii2-version">
    </a>
    <a href="https://github.com/yii2-extensions/app-basic/actions/workflows/build.yml" target="_blank">
        <img src="https://github.com/yii2-extensions/app-basic/actions/workflows/build.yml/badge.svg" alt="build">
    </a>
    <a href="https://codecov.io/gh/yii2-extensions/app-basic" target="_blank">
        <img src="https://codecov.io/gh/yii2-extensions/app-basic/branch/main/graph/badge.svg?token=MF0XUGVLYC" alt="codecov">
    </a>    
    <a href="https://github.com/yii2-extensions/app-basic/actions/workflows/static.yml" target="_blank">
        <img src="https://github.com/yii2-extensions/app-basic/actions/workflows/static.yml/badge.svg" alt="static analysis">
    </a>
    <a href="https://github.styleci.io/repos/698621511?branch=main" target="_blank">
        <img src="https://github.styleci.io/repos/698621511/shield?branch=main" alt="static analysis">
    </a>        
</p>

</br>

<p align="center">
Web Application Basic of Yii Version 2.2. <a href="http://www.yiiframework.com/" title="Yii Framework" target="_blank">Yii Framework</a> application best for rapidly creating projects with Bootstrap 5.
</p>

</br>

![app-basic](docs/home.png)

</br>

## Directory structure

```text
root
├── config                  Configuration files.
├── src             
│   └── Framework 
│       └── Asset           Asset bundles.
│       └── resources 
│           └── css         Css files.
│           └── js          Js files.
│           └── layout      Layout files.
│           └── message     Translation files.
│   └── UseCase
│       └── About           About use case.
│       └── Contact         Contact use case.
│       └── Site            Site use case.
├── tests                   Tests codeception.
├── vendor                  Composer dependencies.
├── web                     Web server public.
```

## Features

The web application contains:

- [x] Pages - [Screenshots]:
    - [about](docs/about.png)
    - [contact](docs/contact.png)

<p align="justify">
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.
</P>

## Installation

<p align="justify">
If you do not have <a href="http://getcomposer.org/" title="Composer" target="_blank">Composer</a>, you may install it by following the instructions at <a href="http://getcomposer.org/doc/00-intro.md#installation-nix" title="getcomposer.org" target="_blank">getcomposer.org</a>.
</p>

You can then install this project app-basic using the following command:

~~~
composer create-project --prefer-dist --stability=dev yii2-extensions/app-basic myapp
~~~

<p align="justify">
Now you should be able to access the application through the following URL, assuming `web` is the directory
directly under the Web root.
</p>

__*Virtual Host:*__

~~~
http://localhost:8080/
~~~

__*Server Yii:*__

~~~
./yii serve > /dev/null 2>&1&
~~~

## Generate translations

<p align="justify">
To generate the Yii 2.2 Web Application Basic translations, you can change the language settings in the configuration file.
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

## Tests

~~~
// download all composer dependencies root project
$ composer update --prefer-dist -vvv

// run all tests with code coverage
$ vendor/bin/codecept run --coverage-xml
~~~

## Our social networks

[![Twitter](https://img.shields.io/badge/twitter-follow-1DA1F2?logo=twitter&logoColor=1DA1F2&labelColor=555555?style=flat)](https://twitter.com/Terabytesoftw)

## License

The MIT License. Please see [License File](LICENSE.md) for more information.
