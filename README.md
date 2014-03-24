# Configure

[![Build Status](https://travis-ci.org/petersuhm/configure.png?branch=master)](https://travis-ci.org/petersuhm/configure)
[![Total Downloads](https://poser.pugx.org/petersuhm/configure/downloads.png)](https://packagist.org/packages/petersuhm/configure)
[![Latest Stable Version](https://poser.pugx.org/petersuhm/configure/v/stable.png)](https://packagist.org/packages/petersuhm/configure)

_A configuration repository for PHP projects._

## Install

Via Composer

```json
{
    "require": {
        "petersuhm/configure": "dev-master"
    }
}
```

## Basic usage

```php
$di->settings = new \Petersuhm\Configure\ConfigurationRepository();

$di->settings->set('template_path', '../templates');

$di->settings->get('template_path');

// You can provide a default value to be returned
$di->settings->get('not_set', 'default_value');

// You can provide multiple configurations in array format
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

As of now, Configure supports [YAML](http://www.yaml.org/) files.

```yaml
# config.yml
localization:
    lang: da
    country: dk
app_name: Configure
```

```php
$loader = new \Petersuhm\Configure\Loader\YamlFileLoader('config.yml');

$di->settings->load($loader);

$di->settings->get('localization.lang');
$di->settings->get('app_name');
```

## Testing

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