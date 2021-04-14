<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        // dd(request()->user()->type);
        // dd(Auth::user()->original);
        $users  = User::where('type', '=', 'user')->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

   //register
    public function store(Request $request)
    {

        $rules = [
            'nama_lengkap'          => 'required',
            'email'                 => 'required|unique:users,email',
            'password'              => 'required|confirmed',
            'alamat'                => 'required',
        ];

        $messages = [
            'nama_lengkap.required' => 'Full name is required!',
            'email.required'        => 'Email is required!',
            'email.unique'          => 'Email is already used!',
            'password.required'     => 'Password is required!',
            'password.confirmed'    => 'Password is not the same as confirmation password!',
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
    $users->type = 'user';
    $simpan = $users->save();

    if($simpan){
        Session::flash('success', 'Successfully add a new user!');
        return redirect('/user');
    } else {
        Session::flash('errors', ['' => 'Failed to add a new user! Please try again later!']);
        return redirect('/user_create');
    }

        // return redirect('/user')->with('status', 'Successfully add a new user!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::where('id', $id)->get();
        return view('user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'email' => 'required'
        ]);

        $users = User::where('id', $id)->first();
        $users->nama_lengkap = $request->nama_lengkap;
        $users->alamat = $request->alamat;
        $users->email = $request->email;
        $simpan=$users->save();

        if($simpan){
            Session::flash('success', 'Successfully updated a user!');
            return redirect('/user');
        } else {
            Session::flash('errors', ['' => 'Update failed! Please try again later!']);
            return redirect('/user_edit/{id}');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::where('id', $id)->first();

        if($users != null){
            $users->delete();

            return redirect('/user')->with('status', 'Successfully deleted the user!');
        }
        return redirect('/user')->with('status', 'ID Not Found!');
    }

    //add user



}
