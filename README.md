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
- nginx-proxy

## Quick local setup

1. Run nginx-proxy.
2. Build image, type in console `docker-compose build`
3. Run full stack, type `docker-compose up -d`
4. Migrate your database `docker exec -it url_shortener bash` and input `php artisan migrate && exit`
5. Add to your /etc/hosts file `127.0.0.1       urlshortener.develop`
6. Visit your local website via browser [urlshortener.develop](http://urlshortener.develop/)

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
