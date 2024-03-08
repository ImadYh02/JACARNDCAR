<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Cars;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => '/first']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome() {
        return view('admin.home');
    }

    public function userHome() {
        return view('user.index');
    }




}
