# Mailigen.com PHP API wrapper

Composer repo for the PHP API wrapper of Mailigen.com. Read more at: [https://dev.mailigen.com/downloads](https://dev.mailigen.com/downloads)

### Installation

Installation via [Composer](https://getcomposer.org/) is the recommended way to install MGAPI. Just run next command: :
```bash
composer require tde/mgapi
```
Or add this line to your `composer.json` file:
```json
"tde/mgapi": "^1.8"
```
And run `composer update`.

### Usage

Use where needed like so:
```php
<?php

use Mailigen\MGAPI\MGAPI;

require_once __DIR__ . '/path/to/vendor/autoload.php';

$api = new MGAPI('your_api_key');
```
