@extends('layout/main')

@section('title', 'Add Merchant | Coda.com')

@section('container')


<div class="container">
    <div style="margin-top: 75px;">
        <div class="col-xs-6 mb-4">
            <h2>Add New Merchant</h2>
        </div>

        <form method="post" action="{{url('merchant/store')}}">
        {{ csrf_field() }}
        <label class="form-label h6">Name</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="merchant name" name="nama">
            </div>
            <label class="form-label h6">Address</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="merchant address" name="alamat">
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

</div>

@endsection
