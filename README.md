# Veltrans

Packge for Integrating Laravel with Midtrans

## Requirements, recommended environment

* Latest stable and LTS Laravel versions.
* PHP 7+

## Installation

```bash
composer require endru/veltrans
```

### Automatic service registration

using auto discovery, the veltrans package will be auto detected by Laravel automatically.

### Manual service registration

In case you want to manually integrate veltrans, set the `dont-discover` in your application `composer.json`, like so:

```json
{
    "extra": {
        "laravel":{
            "dont-discover": "endru/veltrans"
        }
    }
}
```

if you disable auto discovery, you will be able to configure the provider by yourself.

Register the service provider in your `config/app.php`:

```php
'providers' => [
    // [..]
    // Veltrans Providers.
    Endru\Veltrans\Providers\VeltransProvider::class,
]
```

### Deploy configuration

First publish the configuration files so you can modify it to your needs:

```bash
php artisan vendor:publish --tag veltrans
```

Put below code to your `.env` and set the value to your needs:

```env
# Important Veltrans Variable

VELTRANS_MERCHANT_ID=value
VELTRANS_CLIENT_KEY=value
VELTRANS_SERVER_KEY=value
VELTRANS_IS_PRODUCTION=false

# Optional Veltrans Variable
VELTRANS_IS_SANITIZED=true
VELTRANS_IS_3DS=true
```

## License and Contributing

This package is offered under the MIT license. In case you're interested at contributing, make sure to read the contributing guidelines.

### Testing

Run tests using:

```bash
vendor/bin/phpunit
```

## Contact

Get in touch personally using:

* The email address provided in the composer.json.
* Discord chat.
* Twitter