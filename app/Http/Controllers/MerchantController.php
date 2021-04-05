<?php

namespace App\Http\Controllers;

use Auth;
use App\merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{

    public function index()
    {
        $merchant = merchant::all();
        return view('merchant.index', compact('merchant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merchant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        merchant::create($request->all());
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
