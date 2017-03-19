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
Go to mailtrap and create a new account for testing purpose. Its free and after you have set up change the following in you .env file
```
MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=Your User Name
MAIL_PASSWORD=Your Password
MAIL_ENCRYPTION=null
```
###Laravel Debug bar
this to see how many queries we are running. Head over to https://github.com/barryvdh/laravel-debugbar .You will find the all the documentation you need to know about this library. Lets intall this package.
```
composer require barryvdh/laravel-debugbar
```
Once installation is completed naviagte ti config=>app.php and include the following in the package area
```
Barryvdh\Debugbar\ServiceProvider::class,
``` 
###Base Template 
create a new folder resources=>views=>layouts=>partials and inside this newly created folder create a new file _navigation.blade.php. The reason i am using underscore before navigation is to denote that this is a partial view.
 Remove the navigation section from app.blade.php and place it in _navigation.blade.php
 ```
 <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
 ```
Create another file _head and remove chunkc of head code and place it in here
```
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
```
Change the name from Laravel to classified. navigate to config=>app.php and change app name

```
/*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    */

    'name' => 'Classified',//I changed this from Laravel

    /*
```