# Captains Bounty plugin for Filament

[![Latest Version on Packagist](https://img.shields.io/packagist/v/slotgen/slotgen-captainsbounty.svg?style=flat-square)](https://packagist.org/packages/slotgen/slotgen-captainsbounty)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/slotgen/slotgen-captainsbounty/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/slotgen/slotgen-captainsbounty/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/slotgen/slotgen-captainsbounty/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/slotgen/slotgen-captainsbounty/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/slotgen/slotgen-captainsbounty.svg?style=flat-square)](https://packagist.org/packages/slotgen/slotgen-captainsbounty)

<!--delete-->
---
This repo can be used to scaffold a Filament plugin. Follow these steps to get started:

1. Press the "Use this template" button at the top of this repo to create a new repo with the contents of this slotgen-captainsbounty.
2. Run "php ./configure.php" to run a script that will replace all placeholders throughout all the files.
3. Make something great!
---
<!--/delete-->

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require slotgen/slotgen-captainsbounty
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="slotgen-captainsbounty-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="slotgen-captainsbounty-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="slotgen-captainsbounty-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$variable = new Slotgen\SlotgenCaptainsBounty();
echo $variable->echoPhrase('Hello, Slotgen!');
```
Add the plugin to your panel service provider as follows:
```
->plugins([
  \Slotgen\SlotgenCaptainsBounty\SlotgenCaptainsBountyPlugin::make()
])

->navigation(function (NavigationBuilder $builder): NavigationBuilder {
  return $builder->groups([
    \Slotgen\SlotgenCaptainsBounty\SlotgenCaptainsBountyPlugin::make()->getNavigationItems(),
  ]);
});
```

Add the plugin to your panel service provider as follows:
```
->navigation(function (NavigationBuilder $builder): NavigationBuilder {
  return $builder->groups([
    \Slotgen\SlotgenCaptainsBounty\SlotgenCaptainsBountyPlugin::make()->getNavigationItems(),
  ]);
});
```
## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [:author_name](https://github.com/:author_username)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
