<?php

namespace App\Http\Controllers;

use App\Region;
use App\Service;
use App\User;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect(route('admin'));
    }
    // home
    public function home()
    {
        $users=User::where('type','user')->latest('created_at')->limit(8)->get();
        return view('admin.index',compact('users'));
    }
}
