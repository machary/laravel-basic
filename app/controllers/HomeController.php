<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
    protected $layout = 'layouts.scaffold';

    public function index(){
        $r_post = Post::paginate(3);
        return View::make('pages.home',compact('r_post'));
    }

    public function showAdmin()
    {
        return View::make('pages.admin');
    }


}