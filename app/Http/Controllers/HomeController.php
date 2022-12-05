<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //untuk pengarahan route sesuai role user
        if (Auth::user()->role == 'admin') {
            return redirect('admin/menu');
        } elseif (Auth::user()->role == 'owner') {
            return redirect('admin/user');
        } elseif (Auth::user()->role == 'user') {
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }
}
