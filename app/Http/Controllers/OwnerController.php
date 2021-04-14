<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\User;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $owner  = User::where('type', '=', 'owner')->get();
        return view('owner.index', compact('owner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $users->type = 'owner';
        $simpan = $users->save();

        if($simpan){
            Session::flash('success', 'Successfully add a new owner!');
            return redirect('/owner');
        } else {
            Session::flash('errors', ['' => 'Failed to add a new owner! Please try again later!']);
            return redirect('/owner_create');
        }
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
        $owner = User::where('id', $id)->get();
        return view('owner.edit', compact('owner'));
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

        $owner = User::where('id', $id)->first();
        $owner->nama_lengkap = $request->nama_lengkap;
        $owner->alamat = $request->alamat;
        $owner->email = $request->email;
        $simpan = $owner->save();

        if($simpan){
            Session::flash('success', 'Successfully updated a user!');
            return redirect('/owner');
        } else {
            Session::flash('errors', ['' => 'Update failed! Please try again later!']);
            return redirect('/owner_edit/{id}');
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
        $owner = User::where('id', $id)->first();

        if($owner != null){
            $owner->delete();

            return redirect('/owner')->with('status', 'Successfully deleted the user!');
        }
        return redirect('/owner')->with('status', 'ID Not Found!');
    }







}
