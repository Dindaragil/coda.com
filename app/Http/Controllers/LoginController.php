<?php

namespace App\Http\Controllers;

use App\User;
use Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('loreg.login');
    }

    public function cek_login(Request $req){
        $this->validate($req, [
            'email'=>'required',
            'password' => 'required'
        ]);

        $proses=User::where('email', $req->email)->where('password', md5($req->password));

        if($proses->count()>0){
            $proses->first();
            $proses->session()->all();
            return redirect('/home');
        } else {
            $proses->session()->flash('status', 'Task was successful!');
             return redirect(('login'));
        }
    }
}
