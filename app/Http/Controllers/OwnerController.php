<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $owner = new User();
        $owner->nama_lengkap = $request->nama_lengkap;
        $owner->alamat = $request->alamat;
        $owner->email = $request->email;
        $owner->password = md5($request->password);
        $owner->type = 'owner';
        $owner->save();

        return redirect('/owner')->with('status', 'Successfully add a new owner!');
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
        $owner->save();

        return redirect('/owner')->with('status', 'Successfully updated the owner!');
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
