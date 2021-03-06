# HighSender

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]

Laravel module for send e-mails with use <a href="https://awes.io" target="_blank">AWES.io</a> front.

## Installation

Via Composer

``` bash
$ composer require netlinker/high-sender
```

## Usage

Documentation location is [here][link-documentation]

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ ./vendor/bin/dusk-updater detect --auto-update && PKGKIT_CDN_KEY=xxx ./vendor/bin/phpunit
```

For tests can be set all setting from `.env` file as `REDIS_PORT=6379`.

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [NetLinker][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/netlinker/high-sender.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/netlinker/high-sender.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/netlinker/high-sender/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/netlinker/high-sender
[link-downloads]: https://packagist.org/packages/netlinker/high-sender
[link-travis]: https://travis-ci.org/NetLinkerPro/high-sender
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/netlinker
[link-contributors]: ../../contributors
[link-documentation]: https://netlinker.pro/docs/modules/high-sender
