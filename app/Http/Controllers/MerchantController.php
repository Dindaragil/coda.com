<?php

namespace App\Http\Controllers;

use App\merchant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MerchantController extends Controller
{

    public function index()
    {
        $merchant = DB::table('merchant')
                    ->select('merchant.id', 'merchant.nama', 'merchant.alamat', 'users.nama_lengkap')
                    ->join('users', 'users.id', '=', 'merchant.id_user')
                    ->get();
        return view('merchant.index', compact('merchant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $merchant = User::where('id', $id)->get();
        return view('merchant.create', compact('merchant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $merchant = merchant::create($request->all());
        // $merchant->id_user = $this->user->id_user;
        $merchant->id_user = $request->id_user;
        $merchant->nama = $request->nama;
        $merchant->alamat = $request->alamat;
        $merchant->save();
        return redirect('/merchant')->with('status', 'Successfully create a new merchant!');
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
        $merchant = merchant::where('id', $id)->get();
        return view('merchant.edit', compact('merchant'));
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
            'nama' => 'required'
        ]);

        $merchant = merchant::where('id', $id)->first();
        $merchant->nama = $request->nama;
        $merchant->alamat = $request->alamat;
        $merchant->save();

        return redirect('/merchant')->with('status', 'Successfully change the category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merchant = merchant::where('id', $id)->first();

        if($merchant != null){
            $merchant->delete();

            return redirect('/merchant')->with('status', 'Successfully deleted the category!');
        }
        return redirect('/merchant')->with('status', 'ID Not Found!');
    }
}
