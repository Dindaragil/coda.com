<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users  = User::where('type', '=', 'user')->get();
        // dd($users);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User();
        $users->nama_lengkap = $request->nama_lengkap;
        $users->alamat = $request->alamat;
        $users->email = $request->email;
        $users->password = md5($request->password);
        $users->type = 'user';
        $users->save();

        return redirect('/login')->with('status', 'Data anda telah disimpan');
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
        $users->save();

        return redirect('/user')->with('status', 'Successfully updated the category');
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

    public function add(Request $request){
        $users = new User();
        $users->nama_lengkap = $request->nama_lengkap;
        $users->alamat = $request->alamat;
        $users->email = $request->email;
        $users->password = md5($request->password);
        $users->type = 'user';
        $users->save();

        return redirect('/user')->with('status', 'Successfully add a new user!');
    }
}