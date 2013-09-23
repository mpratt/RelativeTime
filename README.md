RelativeTime
============

### Requirements
- PHP >= 5.3

Installation
============

### Install with Composer
If you're using [Composer](https://github.com/composer/composer) to manage
dependencies, you can use this library by creating a composer.json and adding this:

    {
        "require": {
            "mpratt/relativetime": ">=1.0"
        }
    }

Save it and run `composer.phar install`

### Standalone Installation (without Composer)
Download the latest release or clone this repository, place the `Lib/Embera` directory on your project. Afterwards, you only need to include
the Autoload.php file.

```php
    require '/path/to/RelativeTime/Autoload.php';
    $relativeTime = new \RelativeTime\RelativeTime();
```

Or if you already have PSR-0 complaint autoloader, you just need to register Embera
```php
    $loader->registerNamespace('RelativeTime', 'path/to/RelativeTime');
```

Basic Usage
===========


License
=======
**MIT**
For the full copyright and license information, please view the LICENSE file.

Author
=====
Hi! I'm Michael Pratt and I'm from Colombia!
My [Personal Website](http://www.michael-pratt.com) is in spanish.
