<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\MenuManager;
class HomeController extends Controller
{

    use MenuManager;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menu = $this->init()->get_links();
        return view('app')->with(compact('menu'));
    }
}
