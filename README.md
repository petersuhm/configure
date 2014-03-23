# Configure
_A configuration repository for PHP projects._

## Usage

```php
$di->settings = new \Petersuhm\Configure\ConfigurationRepository();

$di->settings->set('template_path', '../templates');

$di->settings->get('template_path');
```
