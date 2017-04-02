# Classified
MVC web site similar to Craig List.
## setup
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
## Nested sets
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
## Laravel Debug bar
this to see how many queries we are running. Head over to https://github.com/barryvdh/laravel-debugbar .You will find the all the documentation you need to know about this library. Lets intall this package.
```
composer require barryvdh/laravel-debugbar
```
Once installation is completed naviagte ti config=>app.php and include the following in the package area
```
Barryvdh\Debugbar\ServiceProvider::class,
``` 
## Base Template 
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
## Populating Areas
Create a Model for Areas. In your console enter the following cmd
```
php artisan make:model Area -m
```
edit the create_areas_table
```
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            NestedSet::columns($table);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
```
Modify area model
```
<?php

namespace App;

namespace Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    use NodeTrait;

    protected $fillable=['name','slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

}

```
create seedertable by running the following cmd
```
php artisan make:seeder AreaTableSeeder
```
Create you list of areas using array-> refer to file AreaTableSeeder.php
update your AppServiceProvider.php for seeder to work.
```<?php

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
        \App\Area::creating (function($area)
        {
            $prefix = $area->parent ? $area->parent->name . ' ': '';
            $area->slug = str_slug($prefix . $area->name);
        });
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
## Area Selection 
Update your routes
```
Route::get('/', 'HomeController@index' );
Auth::routes();
```
update your home view 
```
@extends('layouts.app')

@section('content')
    <div class="container">
        <!---<div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>-->
        <div class="panel panel-info">
            <div class="panel-body">
            <div class="row">
            @foreach($areas as $country)
                <div class ="col-md-12">
                    <h3><a href ="#">{{$country->name}}</a></h3>
                    <hr>
                    <div class="row">
                        @foreach($country->children as $state)
                            <div class="col-md-4">
                                <h4><a href ="#">{{$state->name}}</a></h4>
                                <hr>
                                    @foreach($state->children as $city)
                                    <h5><a href ="#">{{$city->name}}</a></h5>
                                    @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            </div>
            </div>
        </div>
    </div>
@endsection


```
once this is done your view is broken so naviagte to localhost:8000 after login.
up date your home controller. 
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::get()->toTree();

        return view('home',compact('areas'));
    }
}
```
## Choosing and persisting an area
make new controller
```
php artisan make:controller User\\AreaController
```
Update you AreaController
```
<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    //
    public function store()
    {
        session()->put('area',$area->slug);
        //redirect to category index
        return redirect ()->back();
    }
}

```
Update your routes in your web.php
```
Route::get('user/area/{area}','User\AreaController@store')->name('user.area.store');
```
update your views in home.blade.php
```
@extends('layouts.app')

@section('content')
    <div class="container">
        <!---<div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>-->
        <div class="panel panel-info">
            <div class="panel-body">
            <div class="row">
            @foreach($areas as $country)
                <div class ="col-md-12">
                    <h3><a href ="{{route('user.area.store',$country) }}">{{$country->name}}</a></h3>
                    <hr>
                    <div class="row">
                        @foreach($country->children as $state)
                            <div class="col-md-4">
                                <h4><a href ="{{route('user.area.store',$state) }}">{{$state->name}}</a></h4>
                                <hr>
                                    @foreach($state->children as $city)
                                    <h5><a href ="{{route('user.area.store',$city) }}">{{$city->name}}</a></h5>
                                    @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            </div>
            </div>
        </div>
    </div>
@endsection

```
Create a nw folder inside your Http as ViewComposer and run the following command
```
php artisan make:provider ComposerServiceProvider
```
Head over to app.php inside you config file and register is service.
```
App\Providers\ComposerServiceProvider::class,
```
Go to ComposerServiceProvider.php and update the boot function. In this case we want to view all the areas in our view
Update your AreaComposer
```
 public function compose(View $view)
    {
        //Australia in Config

        if(!$this->area)
        {
            $this->area = \App\Area::where('slug', session()->get('area',config()->get('classified.defaults.area')))->first();
        }
        return $view->with('area', $this->area);
    }
```
now if you look at the number of queries run there is more than one. Now you avoid this we are going to use singlton method.Update your ComposerServiceProvider.
```
public function register()
    {
        //
        $this->app->singleton(AreaComposer::class);
    }
```
Now that we have got that update you navigations page.
```
 {{ config('app.name', 'Laravel') }} ({{ $area->name }})
```
## Populating Categories
Create a new model for categories and migration model.
```
php artisan make:model Category -m
```
Implement the need columns for the table.
```
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
Use Kalnoy\Nestedset\Nestedset;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->float('price')->default(0);
            NestedSet::columns($table);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}

```
Migrate the table
```
php artisan migrate
```
lets create a seeder for category table
```
php artisan make:seeder CategoryTableSeeder
```
update our category.php file
```
use NodeTrait;

    protected $fillable=['name','slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

```
I like to re create my db seed or first TRUNCATE TABLE
```
TRUNCATE TABLE table_name
```
and run the following commands
```
php artisan db:seed -vvv
```
## Listing categories
Create an new controller
```
php artisan make:controller Category\\CategoryController
```
update categoryController.php
```
<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Area;

class CategoryController extends Controller
{
    //
    public function index(Area $area)//this will be same for all of our controllers
    {
        dd($area);
    }
}

```
Implement methods in your routes
```
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index' );

Auth::routes();

Route::get('user/area/{area}','User\AreaController@store')->name('user.area.store');

Route::group(['prefix' => '/{area}'], function (){
    /**
    *Category
    */
    Route::group(['prefix' =>'/categories'],function(){
        Route::get('/','Category\CategoryController@index')->name('category.index');

    });
});
/*Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
*/
```
update catogory controller
```
<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Area;

class CategoryController extends Controller
{
    //
    public function index(Area $area)//this will be same for all of our controllers
    {
        // now we need to grab all categorys  and pass them
        //eager load listings
        $categories = Category::get()->toTree();
        return view('categories.index',compact('categories'));
    }
}

```
now create a view for category. Create a new folder as categories and file index.blade.php
```
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-4">
                        <h5> {{ $category->name }}</h5>
                        <hr>

                        @foreach($category->children as $sub)
                            <h5><a href ="#">{{$sub->name}}</a>(x)</h5>
                        @endforeach

                    </div>
                @endforeach
            </div>
    </div>
@endsection

```
make categories accessable via link
```
  <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('category.index', [$area])  }}">Categories</a></li>
                    </ul>
```
## Litings

### Setting up Listings
Create a listing model

```
php artisan make:model Listing -m
```
in your Listing Migrations implement the following table 
```
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('body');
            $table-integer('user_id')->unsigned();
            $table-integer('area_id')->unsigned();
            $table-integer('category_id')->unsigned();
            $table->boolean('live')->default(false);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings');
    }
}

```
Now lets migrate the listing table
```
php artisan migrate
```