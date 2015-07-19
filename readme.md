## Araytek ERP System

Araytek ERP is a project powerd by Laravel 5.1

----------

### Setting up project

First, change to project root and let composer install project by issuing following command in terminal:

```
composer install
```

----------

Then issuing following command to update package information and recompile:

```
composer update
```

----------

Wait until composer process completed, and copy database into `/storage/app` since it's been ignore by git.

Note that if database isn't `database.sqlite`, rename it or modify path of database which locate at `/config/database.php`

```
#!php

     'connections' => [

        'sqlite' => [
            'driver'   => 'sqlite',
            'database' => storage_path('app/database.sqlite'),
            'prefix'   => '',
        ],
        ...
```

----------

Since `.env` has been ignore by git by default, we should at least set `APP_KEY` in `.env` manually like following configuration:
```
APP_DEBUG=true
APP_KEY=c9bQB2WLj5j2OhhvuWoFAbKZCWs8DiCz
```
For more detail, take a look at [Laravel Documentation](http://laravel.com/docs/5.1/installation#environment-configuration).

----------

Don't forget to point entrance to `/public`, and we are finally good to go : )

----------

### License

Copyright © 2015 [`Araytek`](http://www.araytek.net).

----------
### Author
Made by [`osk2`](http://osk2.me) without <3