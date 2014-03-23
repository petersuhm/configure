# Configure
_A configuration repository for PHP projects._

## Usage

```php
$settings = new \Petersuhm\Configure\ConfigurationRepository();

$settings->set('template_path', '../templates');

$settings->get('template_path');
```