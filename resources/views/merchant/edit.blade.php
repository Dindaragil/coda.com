@extends('layout/main')

@section('title', 'Update Merchant | Coda.com')

@section('container')


<div class="container">
    <div style="margin-top: 75px;">
        <div class="col-xs-6 ">
            <h2>Update Merchant</h2>
        </div>
        @foreach( $merchant as $mc )
        <form method="post" action="{{url('merchant_update', $mc->id)}}">
            {{ csrf_field() }}
            @method('put')
            <label class="form-label h6">Name</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control " placeholder="merchant name" name="nama" value="{{$mc->nama}}">
            </div>
            <label class="form-label h6">Address</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="merchant address" name="alamat" value="{{$mc->alamat}}">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        @endforeach
    </div>

</div>

@endsection
