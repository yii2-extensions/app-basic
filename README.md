<p align="center">
    <a href="https://github.com/terabytesoft/app-basic" target="_blank">
        <img src="https://lh3.googleusercontent.com/D9TFw1F6ddPuheDc_tpNptTdvTg-FNNpjLSBN14X6Sc-3JDiOxfE67rEh4OZfygonx1tKei2b2DEOHDLjF6T3xl8e-rkEEPZeGqLTWcS_v2cBRlyo0vcZLDHG5ivSDGIWCsenbol=w2400" height="50px;">
    </a>
    <h1 align="center">Web Application Basic</h1>
</p>

<p align="center">
    <a href="https://packagist.org/packages/terabytesoftw/app-basic" target="_blank">
        <img src="https://poser.pugx.org/terabytesoftw/app-basic/v/unstable" alt="Unstable Version">
    </a>
    <a href="https://travis-ci.org/terabytesoftw/app-basic" target="_blank">
        <img src="https://travis-ci.org/terabytesoftw/app-basic.svg?branch=master" alt="Build Status">
    </a>  
    <a href="https://scrutinizer-ci.com/g/terabytesoftw/app-basic/" target="_blank">
        <img src="https://scrutinizer-ci.com/g/terabytesoftw/app-basic/badges/build.png?b=master" alt="Build Status">
    </a>
    <a href="https://scrutinizer-ci.com/g/terabytesoftw/app-basic/" target="_blank">
        <img src="https://scrutinizer-ci.com/g/terabytesoftw/app-basic/badges/coverage.png?b=master" alt="Build Status">
    </a>    
    <a href="https://scrutinizer-ci.com/g/terabytesoftw/app-basic/?branch=master" target="_blank">
     	<img src="https://scrutinizer-ci.com/g/terabytesoftw/app-basic/badges/quality-score.png?b=master" alt="Code Quality">
    </a>
    <a href="https://scrutinizer-ci.com/code-intelligence" target="_blank">
     	<img src="https://scrutinizer-ci.com/g/terabytesoftw/app-basic/badges/code-intelligence.svg?b=master" alt="Code Intelligence Status">
    </a>
    <a href="https://codeclimate.com/github/terabytesoftw/app-basic/maintainability" target="_blank">
        <img src="https://api.codeclimate.com/v1/badges/9bbe65b6fda1abd74c2c/maintainability" alt="Maintainability">
    </a>		
</p>
</br>

<p align="center">
App Web Application Basic of Yii Version 2.0. <a href="http://www.yiiframework.com/" title="Yii Framework" target="_blank">Yii Framework</a> application best for rapidly creating projects with Bootstrap 4.
</p>

</br>

![app-basic](docs/images/home.jpg)

</br>

### **DIRECTORY STRUCTURE:**

```
config/             contains application configurations
docs/               contains documentation application basic
src/
  assets/           contains assets definition
  controllers/      contains controller class
  forms/            contains forms class
  messages/         contains messages translate application 
  views/            contains views files for web application
tests/              contains tests codeception for the web application
vendor/             contains dependent 3rd-party packages
```

### **FEATURES:**

The App Web Application contains:

- [x] Pages - [Screenshots]:
    - [about](docs/images/about.jpg)
    - [contact](docs/images/contact.jpg)

<p align="justify">
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.
</P>

### **REQUIREMENTS:**

- The minimum requirement by this project template that your Web server supports:
    - PHP 7.2 or higher.

### **INSTALLATION:**

<p align="justify">
If you do not have <a href="http://getcomposer.org/" title="Composer" target="_blank">Composer</a>, you may install it by following the instructions at <a href="http://getcomposer.org/doc/00-intro.md#installation-nix" title="getcomposer.org" target="_blank">getcomposer.org</a>.
</p>

You can then install this project template using the following command:

~~~
composer create-project --prefer-dist --stability=dev terabytesoftw/app-template-basic myapp
~~~

<p align="justify">
Now you should be able to access the application through the following URL, assuming `public` is the directory
directly under the Web root.
</p>

<p align="justify">
<strong>App Web Application Basic (terabytesoftw/app-basic) is installed automatically together with the Web Project Skeleton Application Basic (terabytesoftw/app-template-basic), both try the necessary packages to start your Web Application Basic in Yii 2.0.</strong>
</p>

__*Virtual Host:*__

~~~
http://localhost/
~~~

__*Server Yii:*__

Directory - [app-template-basic]

~~~
php -S 127.0.0.1:8080 -t public > /dev/null 2>&1&
~~~

### **CONFIGURATION:**

- [Detailed Settings](docs/Config.MD).

**NOTE:** 

<p align="justify">
All the configuration is customizable through parameters, there is no need to modify any configuration of Yii 2.0 Web Application Basic, if you need any extra configuration you can open an issue with pleasure we will add it.
</p>

Very important when changing any configuration run `composer du`, to apply it.

### **GENERATE MESSAGES TRANSLATION:**

<p align="justify">
To generate the Yii 2.0 Web Application Basic translations, you can change the language settings in:
<p>

```
config/messages.php - [app-template-basic]:

'languages' => ['en'], 
```
<p align="justify">
 Automatically the generator will create the folder of your language in /messages - [app-template-basic], If any translation is needed, you can open an issue to add it.
</p>

```
root directory - [app-template-basic]:
./vendor/bin/yii message config/messages.php
```

### **RUN TESTS CODECEPTION:**

~~~
// access path directory app-basic
$ cd vendor/terabytesoft/app-basic

// download all composer dependencies
$ composer update --prefer-dist -vvv

// download & run crhomedriver version chrome desktop
$ wget -P vendor/bin https://chromedriver.storage.googleapis.com/75.0.3770.90/chromedriver_linux64.zip
$ unzip -o -q vendor/bin/chromedriver_linux64.zip
$ vendor/bin/chromedriver --port=9515 --url-base=wd/hub/ > /dev/null 2>&1&

// run web server cli php
$ php -S 127.0.0.1:8080 -t tests/public > /dev/null 2>&1&

// run all tests with code coverage
$ vendor/bin/codecept run --coverage-xml
~~~

### **WEB SERVER SUPPORT:**

- Apache.
- Nginx.
- OpenLiteSpeed.

### **DOCUMENTATION STYLE GUIDE:**

[Style CI Documentation PSR2.](https://docs.styleci.io/presets#psr2)

### **LICENCE:**

[![License](https://poser.pugx.org/terabytesoftw/app-basic/license)](LICENSE.md)
[![YiiFramework](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](https://www.yiiframework.com/)
[![Total Downloads](https://poser.pugx.org/terabytesoftw/app-basic/downloads)](https://packagist.org/packages/terabytesoft/app-basic)
[![Total Downloads](https://github.styleci.io/repos/165419144/shield?branch=master)](https://github.styleci.io/repos/165419144)
