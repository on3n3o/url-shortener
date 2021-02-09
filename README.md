<p align="center"><img src="https://21l.pl/img/logo.png" width="400"></p>

<p align="center">
<a href="https://github.com/on3n3o/url-shortener"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About url-shortener

url-shortener is an application based on Laravel 7.x and Bulma. Main features are:
- Fast response time via Redis
- No bloatware
- Ads served by adsterra
- Easy to set up
- Full tracking on redirects

## Prequisits

- Docker
- docker-compose

## Quick local setup

1. Stop locally serving on ports 80, 3306, 6379, 1025, 8025
2. Run command `./vendor/bin/sail up`
3. Run command `./vendor/bin/sail artisan migrate`
6. Visit your local website via browser [localhost](http://localhost/)

## Official url-shortener sites

Official pages:

- **[21L.PL](https://21l.pl/)**

## Contributing

Thank you for considering contributing to the url-shortener! You can do it through Pull Request.

## Code of Conduct

Please consider informing us about any issues via [https://github.com/on3n3o/url-shortener/issues](https://github.com/on3n3o/url-shortener/issues)

## Security Vulnerabilities

If you discover a security vulnerability within url-shortener, please send an e-mail to Marcin Maciejewski via [m.maciejewski@ulanelectronics.pl](mailto:m.maciejewski@ulanelectronics.pl). All security vulnerabilities will be promptly addressed.

## License

The url-shortener is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
