<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function cek_login(Request $req){
        $this->validate($req, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $proses = User::where('email', $req->email)
                      ->where('password', md5($req->password));

        if($proses->count()>0){
            $data=$proses->first();
            Session::put('id', $data->id);
            Session::put('nama_lengkap', $data->nama_lengkap);
            Session::put('email', $data->email);
            Session::put('password', $data->password);
            Session::put('type', $data->type);
            Session::put('login_status', true);
            return redirect('/home')->with('alert_message', 'berhasil mengubah data');
        } else {
            Session::flash('pesan', 'Invalid email or password');
            return redirect('login');
        }
    }

    public function logout(){
        Session::flush();
        return redirect(('login'));
    }
}
