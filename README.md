# lightpages
Page crud admin generator

#Installation

First, you'll need to install the package via Composer:

```shell
$ composer require ipitchkhadze/lightpages v1.0.1.x-dev
```

Then, update `config/app.php` by adding an entry for the service provider.

```php
'providers' => [
    // ...
    Ipitchkhadze\LightPages\LightPagesServiceProvider::class,
];
```
Then, generate needed files for Lightpages.

```shell
php artisan lightpages:generate
```
Finally, from the command line again, publish assets:

```shell
php artisan vendor:publish --tag=public --force
```

Visit http://your.site/admin/pages

Done!

