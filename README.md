# LightPages
Laravel 5.4 page crud admin generator

Installation
------------

First, you'll need to install the package via Composer:

```shell
$ composer require ipitchkhadze/lightpages v1.0.*
```

Then, update `config/app.php` by adding an entry for the service provider.

```php
'providers' => [
    // ...
    Ipitchkhadze\LightPages\LightPagesServiceProvider::class,
];
```
Then, make migration of lightpages table.

```shell
php artisan migrate
```
Then, generate needed files for Lightpages.

```shell
php artisan lightpages:generate
```
Finally, from the command line again, publish assets:

```shell
php artisan vendor:publish --tag=public --force
```

Visit http://your.site/admin/pages to see admin panel.

Done!

Usage
-----
For creating new pages first you need to add languages.

![Language crud](https://preview.ibb.co/djejkk/screencapture1.png)

After adding languages you can go to /admin/pages and create new pages.



You can change base template in 

    /resources/pages/layout/layout.blade.php
    
You can change page view in

    /resources/pages/index.blade.php
    
Default page view

![New page form](https://preview.ibb.co/nQuBWQ/screencapture3.png)

Have fun!
