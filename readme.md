## Araytek ERP System
Araytek ERP is the system powerd by Laravel 5.1.

----------

### Setting up project

First, change to project root and let composer install project by issuing following command in terminal:

```
composer install
```

Then issuing following command to update package information and recompile:

```
composer update
```

Wait until composer process completed, and copy database into `/storage/app` since it's been ignore by git.

Note that if database isn't `database.sqlite`, rename it or modify path of database which locate at `/config/database.php`

```
     'connections' => [

        'sqlite' => [
            'driver'   => 'sqlite',
            'database' => storage_path('app/database.sqlite'),
            'prefix'   => '',
        ],
        ...
```

`.env` configuration has been ignore because this `README` assume the system will only be used in private network or somewhere safe, if not, then you should al least set `APP_KEY` in `.env`, take a look into `.env.example` for more detailed information.

Finally, we are good to go : )

----------

### License

Copyright © 2015 `Araytek`.

----------
### Author
Made by `osk2` without <3