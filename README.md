# Configure
_A configuration repository for PHP projects._

## Usage

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
```
