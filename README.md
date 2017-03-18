# Classified
MVC web site similar to Craig List.
###setup
Get the set up done. In your .env file edit the following.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=classified
DB_USERNAME=root
DB_PASSWORD=

```
Followed by in you config-> database.php file
```
 'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'classified'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
```
Create a new database in your MySql DB as classified.
If you get this message when performing table migrations
```
 [Illuminate\Database\QueryException]
  SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes (SQL: alter table `users` add un
  ique `users_email_unique`(`email`))
```

change the following in the AppserviceProvider.php file

```
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

```
now lets create our login page. iin your console write
```
php artisan make:auth
```
This will generate a basic login and register page
If you happen to get the following two errors
```
1/2
PDOException in Connector.php line 68:
SQLSTATE[HY000] [1045] Access denied for user 'homestead'@'localhost' (using password: YES)

2/2
QueryException in Connection.php line 647:
SQLSTATE[HY000] [1045] Access denied for user 'homestead'@'localhost' (using password: YES) (SQL: select count(*) as aggregate from `users` where `email` = user@gmail.com)
```
Please run the following command. Make sure you close all cmd and restart cmd
```
php artisan config:clear
```
###Nested sets
Suppose that we have a model Category; a $node variable is an instance of that model and the node that we are manipulating. It can be a fresh model or one from database.Relationships

Node has following relationships that are fully functional and can be eagerly loaded:

Node belongs to parent
Node has many children
Node has many descendants
Please visit the link for detailed docu. https://github.com/lazychaser/laravel-nestedset
Run the following cmd in your teminal
```
composer require kalnoy/nestedset
```