@extends('layout/main')

@section('title', 'Merchant | Coda.com')

@section('container')


<div class="container">
    <div style="margin-top: 75px; margin-bottom: 75px;">
        <div class="col-xs-6">
            <h2>Merchants</h2>
        </div>

        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <table class="table table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $merchant as $mc )
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$mc->id}}</td>
                    <td>{{$mc->nama}}</td>
                    <td>{{$mc->alamat}}</td>
                    <td>
                        <form action="{{ url('merchant_destroy', $mc->id )}}" method="post">
                            {{ csrf_field() }}
                            @method('delete')
                            <a href="{{url('merchant_edit', $mc->id)}}" class="btn btn-sm btn-primary">Edit</a>
                            <button type="submit" class="btn btn-sm btn-outline-primary" onclick="return confirm('Are you Sure?')">Delete</button>
                            <a href="{{url('produk_create', $mc->id)}}" class="btn btn-sm btn-outline-dark">Add Product</a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
