<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $type = Auth::user()->type;
        // if($type == "admin") {
        //     return redirect('/user');
        // } else if($type == "owner") {
        //     return redirect('/product');
        // } else if($type == "user") {
        //     return redirect('/dashboard');
        // } else {
        //     return redirect('/logout');
        // }

        return view('index');
    }




}
