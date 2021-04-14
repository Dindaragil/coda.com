@extends('layout/main')

@section('title', 'Update Merchant | Coda.com')

@section('container')


<div class="container">
    <div style="margin-top: 75px; margin-bottom: 75px;">
        <div class="col-xs-6 ">
            <h2>Update Merchant</h2>
        </div>
        @foreach( $merchant as $mc )
        <form method="post" action="{{url('merchant_update', $mc->id)}}">
            {{ csrf_field() }}
            @method('put')
            @if(session('errors'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Something it's wrong:
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <label class="form-label h6">Name</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control " placeholder="merchant name" name="nama" value="{{$mc->nama}}" required>
            </div>
            <label class="form-label h6">Address</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="merchant address" name="alamat" value="{{$mc->alamat}}" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @endforeach
    </div>

</div>

@endsection
