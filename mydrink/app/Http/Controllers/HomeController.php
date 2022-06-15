<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
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
        // $pemasukan = Auth::user()->transaction->sum('total');
        // return view('home', compact('pemasukan'));
        return view('home');
    }
    public function beranda()
    {
        $products = Product::all();
        return view('beranda', compact('products'));
    }
}
