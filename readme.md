# PHP VAT Library
[![Build Status](https://travis-ci.org/MadeITBelgium/laravel-failed-job-monitor.svg?branch=master)](https://travis-ci.org/MadeITBelgium/laravel-failed-job-monitor)
[![Coverage Status](https://coveralls.io/repos/github/MadeITBelgium/laravel-failed-job-monitor/badge.svg?branch=master)](https://coveralls.io/github/MadeITBelgium/laravel-failed-job-monitor?branch=master)
[![Latest Stable Version](https://poser.pugx.org/MadeITBelgium/laravel-failed-job-monitor/v/stable.svg)](https://packagist.org/packages/MadeITBelgium/laravel-failed-job-monitor)
[![Latest Unstable Version](https://poser.pugx.org/MadeITBelgium/laravel-failed-job-monitor/v/unstable.svg)](https://packagist.org/packages/MadeITBelgium/laravel-failed-job-monitor)
[![Total Downloads](https://poser.pugx.org/MadeITBelgium/laravel-failed-job-monitor/d/total.svg)](https://packagist.org/packages/MadeITBelgium/laravel-failed-job-monitor)
[![License](https://poser.pugx.org/MadeITBelgium/laravel-failed-job-monitor/license.svg)](https://packagist.org/packages/MadeITBelgium/laravel-failed-job-monitor)

#Installation

Require this package in your `composer.json` and update composer.

```php
"madeitbelgium/laravel-failed-job-monitor": "~1.*"
```

```php
composer require spatie/laravel-failed-job-monitor
```

After updating composer, add the ServiceProvider to the providers array in `config/app.php`

```php
MadeITBelgium\LaravelFailedJobMonitor\FailedJobMonitorServiceProvider::class,
```
You must publish the config file:

```php
php artisan vendor:publish --provider="MadeITBelgium\LaravelFailedJobMonitor\FailedJobMonitorServiceProvider"

```

# Documentation

The complete documentation can be found at: [(http://www.madeit.be](http://www.madeit.be)

# Support

Support github or mail: info@madeit.be

# Contributing

Please try to follow the psr-2 coding style guide. http://www.php-fig.org/psr/psr-2/

# License

This package is licensed under LGPL. You are free to use it in personal and commercial projects. The code can be forked and modified, but the original copyright author should always be included!