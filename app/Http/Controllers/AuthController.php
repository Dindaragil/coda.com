<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\User;
use SebastianBergmann\Environment\Console;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];

        $messages = [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        Auth::attempt($data);

        if (Auth::check()) {
            return redirect()->route('home');
        } else {

            Session::flash('error', 'Invalid Email or Password');
            return redirect()->route('login');

        }

        
    }

    public function showFormRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $rules = [
            'nama_lengkap'          => 'required',
            'email'                 => 'required|unique:users,email',
            'password'              => 'required|confirmed',
            'alamat'                => 'required',
            'type'                  => 'required'
        ];

        $messages = [
            'name.required'         => 'Full name is required',
            'email.required'        => 'Email is required',
            'email.unique'          => 'Email is already used',
            'password.required'     => 'Password is required',
            'password.confirmed'    => 'Password is not the same as confirmation password '
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $users = new User;
        $users ->nama_lengkap = ($request->nama_lengkap);
        $users->email= strtolower($request->email);
        $users->password = Hash::make($request->password);
        $users ->alamat = ($request->alamat);
        $users->type = ($request->type);
        $simpan = $users->save();

        if($simpan){
            Session::flash('success', 'Register successful! Please login to access data');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register failed! Please try again later!']);
            return redirect()->route('register');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
