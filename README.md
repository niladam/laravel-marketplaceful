# Marketplaceful - Self-host your marketplace software

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marketplaceful/laravel-marketplaceful.svg?style=flat-square)](https://packagist.org/packages/marketplaceful/laravel-marketplaceful)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/marketplaceful/laravel-marketplaceful/run-tests?label=tests)](https://github.com/marketplaceful/laravel-marketplaceful/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/marketplaceful/laravel-marketplaceful.svg?style=flat-square)](https://packagist.org/packages/marketplaceful/laravel-marketplaceful)

## Installation

A web platform for quickly building online marketplaces built on Laravel.

1. Add the `marketplaceful:install` command to `post-autoload-dump` in `composer.json` .

``` json
"post-autoload-dump": [
    "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
    "@php artisan package:discover --ansi",
    "@php artisan marketplaceful:install --ansi"
],
```

2. Require `marketplaceful/laravel-marketplaceful`.

``` bash
composer require marketplaceful/laravel-marketplaceful
```

3. Add the `MarketplacefulAuthenticatable` trait to your existing User model:

``` php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Marketplaceful\Traits\MarketplacefulAuthenticatable;

class User extends Authenticatable {

    use MarketplacefulAuthenticatable;

}
```

4. Run migrations.

``` bash
php artisan migrate
```

### Dashboard Authorization
Marketplaceful exposes a dashboard at /marketplaceful. By default, you will only be able to access this dashboard in the local environment. To use it in another environment, you need to register a gate check.

You can determine which users of your application are allowed to view the Marketplaceful dashboard by defining a gate check called `viewMarketplaceful`.

A common place to register this check is in a service provider:

```php
// in a service provider

public function boot()
{
   Gate::define('viewMarketplaceful', function ($user) {
       return in_array($user->email, [
            'oliver@radiocubito.com',
        ]);
   });
}
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Oliver Jiménez-Servín](https://github.com/oliverds)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
