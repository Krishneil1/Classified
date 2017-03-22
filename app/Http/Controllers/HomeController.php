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
