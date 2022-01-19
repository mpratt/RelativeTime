# RelativeTime

[![Build Status](https://github.com/mpratt/RelativeTime/actions/workflows/tests.yml/badge.svg?branch=master)](https://github.com/mpratt/RelativeTime/actions)
[![Total Downloads](https://img.shields.io/packagist/dt/mpratt/relativetime.svg)](https://packagist.org/packages/mpratt/relativetime)
[![Monthly Downloads](https://img.shields.io/packagist/dm/mpratt/relativetime)](https://packagist.org/packages/mpratt/relativetime)
[![Latest Stable Version](https://img.shields.io/packagist/v/mpratt/relativetime.svg)](https://packagist.org/packages/mpratt/relativetime)

[![Support via PayPal](https://cdn.rawgit.com/twolfson/paypal-github-button/1.0.0/dist/button.svg)](https://paypal.me/mtpratt)

RelativeTime is a lightweight and easy to use library that helps you calculate the time difference between two dates and returns the result in words
(like, 5 minutes ago or 5 minutes left). The library supports other languages as well like `Spanish`, `PortugueseBR`, `French`, `Czech`, `Russian`,
`SimplifiedChinese`, `Swedish` and `German`

It uses the standard \DateTime() and \DateInterval() classes found in modern PHP versions. For more information, please read the `Usage` section of
this README.

## Requirements

- PHP >= 5.3 (Tested only on PHP +7.3)

### Installation

#### Install with Composer

If you're using [Composer](https://github.com/composer/composer) to manage
dependencies, you can use this library by creating a composer.json file and adding this:

    {
        "require": {
            "mpratt/relativetime": "~1.0"
        }
    }

Save it and run `composer.phar install`

#### Standalone Installation (without Composer)

Download the latest release or clone this repository, place the `Lib/RelativeTime` directory somewhere in your project. Afterwards, you only need to include
the included `Autoload.php` file.

```php
    require '/path/to/RelativeTime/Autoload.php';

    use RelativeTime\RelativeTime;

    $relativeTime = new RelativeTime();
```

Or if you already have PSR-0 compliant autoloader, you just need to register RelativeTime:

```php
    $loader->registerNamespace('RelativeTime', 'path/to/RelativeTime');
```

#### Usage

Most of the times you are going to need the `convert($fromDate, $toDate)` method.

```php

    use RelativeTime\RelativeTime;

    $relativeTime = new RelativeTime();
    echo $relativeTime->convert('2010-09-05', '2010-03-30');
    // 5 months, 6 days ago

    $relativeTime = new RelativeTime();
    echo $relativeTime->convert('2012-03-05', '2013/02/05');
    // 11 months left
```

There are 2 other useful methods `timeAgo($date)` and `timeLeft($date)`, that calculate the time since/until
the current date/time.

```php
    use RelativeTime\RelativeTime;

    // Asumming Today is the 2013-09-23 17:23:47


    $relativeTime = new RelativeTime();
    echo $relativeTime->timeAgo('2012-08-29 06:00');
    // 1 year, 25 days, 16 hours, 23 minutes, 13 seconds ago

    $relativeTime = new RelativeTime();
    echo $relativeTime->timeLeft('2013-10-31 01:00:05');
    // 1 month, 7 days, 2 hours, 36 minutes, 52 seconds left
```

#### Configuration Options

The main object accepts an array with configuration directives

```php

    use RelativeTime\RelativeTime;

    $config = array(
        'language' => '\RelativeTime\Languages\English',
        'separator' => ', ',
        'suffix' => true,
        'truncate' => 0,
        'use_weeks' => false,
    );

    $relativeTime = new RelativeTime($config);
```

| Directive |                                                                                                   Definition                                                                                                   |
| --------- | :------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------: |
| language  | The language to be used, for example `English`, `Spanish`, `PortugueseBR`, `French`, `Czech`, `Russian`, `SimplifiedChinese`, `Swedish` or `German` are supported. Even The instantiated object is allowed, as in `new \RelativeTime\Languages\English()` |
| separator |                                                                               The separator between time units. `, ` by default.                                                                               |
| truncate  |                                                           The number of units you want to display. By default it displays all of the available ones.                                                           |
| suffix    |                                                                            Whether or not to append the `.... ago` or `..... left`                                                                             |
| use_weeks | By default is set to false. When set to true it will include week numbers too.                                                                                                                                 |

## Author

Michael Pratt - <yo@michael-pratt.com> - <http://www.michael-pratt.com>
See also the list of [contributors](https://github.com/mpratt/relativetime/contributors) which participated in this project.

If you like this library, it has been useful to you and want to support me, you can do it via paypal.

[![Support via PayPal](https://cdn.rawgit.com/twolfson/paypal-github-button/1.0.0/dist/button.svg)](https://paypal.me/mtpratt)

## License

RelativeTime is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
