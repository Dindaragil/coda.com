@extends('layout/main')

@section('title', 'Add Merchant | Coda.com')

@section('container')


<div class="container">
    <div style="margin-top: 150px; margin-bottom: 150px;">
        <div class="col-xs-6 mb-4">
            <h2>Add New Merchant</h2>
        </div>

        @foreach( $merchant as $mc )
        <form method="post" action="{{url('/merchant_store')}}">
            {{ csrf_field() }}
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
            <label class="form-label h6">Owner ID</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="owner's id" name="id_user" value="{{$mc->id}}"  readonly>
            </div>
            <label class="form-label h6">Merchant Name</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="merchant name" name="nama" required>
            </div>
            <label class="form-label h6">Address</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="merchant address" name="alamat" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @endforeach
    </div>

</div>

@endsection
