# Configure

[![Build Status](https://travis-ci.org/petersuhm/configure.png?branch=master)](https://travis-ci.org/petersuhm/configure)
[![Total Downloads](https://poser.pugx.org/petersuhm/configure/downloads.png)](https://packagist.org/packages/petersuhm/configure)
[![Latest Stable Version](https://poser.pugx.org/petersuhm/configure/v/stable.png)](https://packagist.org/packages/petersuhm/configure)

_A configuration repository for PHP projects._

Configure is a configuration repository for PHP projects. If your app depends on
some sort of configuration settings, you can use Configure to handle them. It
has a simple API and supports for different kinds of configuration file
[formats](#using-configuration-files).

## Install

You can install Configure via Composer:

```json
{
    "require": {
        "petersuhm/configure": "dev-master"
    }
}
```

## Basic usage

Using Configure is as simple as instantiating the `ConfigurationRepository`
class and start adding settings to it:

```php
$di->settings = new \Petersuhm\Configure\ConfigurationRepository();

$di->settings->set('template_path', '../templates');

```

Now you can start querying the repository:

```php
$di->settings->get('template_path');

// You can also provide a default value to be returned
$di->settings->get('not_set', 'default_value');

```

Configure also has supports for arrays:

```php

$di->settings->set([
    'lang' => 'da',
    'country' => 'dk'
]);

// Multi dimensional arrays will be flattened using dot notation
$di->settings->set([
    'localization' => [
        'lang' => 'da',
        'country' => 'dk'
    ]
]);
$di->settings->get('localization.lang');
$di->settings->get('localization.country');
```

## Using configuration files

As of now, Configure supports [YAML](http://www.yaml.org/) and PHP files.

```yaml
# config.yml
localization:
    lang: da
    country: dk
app_name: Configure
```

```php
# config.php
<?php

return array(

    'localization' => array(
        'lang' => 'da',
        'country' => 'dk'
    ),

    'app_name' => 'Configure'
);
```

In order to load the files, you need to create an instance of the relevant file
loader class and provide it to the `load()` method on the repository:

```php
$loader = new \Petersuhm\Configure\Loader\YamlFileLoader('config.yml');
// or
$loader = new \Petersuhm\Configure\Loader\ArrayFileLoader('config.php');

$di->settings->load($loader);

$di->settings->get('localization.lang');
$di->settings->get('app_name');
```

## Testing

Configure is fully covered by unit tests. All code is written using a behavior
driven approach with [phpspec](http://phpspec.net/).

```bash
$ vendor/bin/phpspec run
```

## Contributing

Please see [CONTRIBUTING](https://github.com/petersuhm/configure/blob/master/CONTRIBUTING.md) for details.

## Credits

- [Peter Suhm](https://github.com/petersuhm)
- [All Contributors](https://github.com/petersuhm/configure/contributors)


## License

The MIT License (MIT). Please see [License File](https://github.com/petersuhm/configure/blob/master/LICENSE) for more information.