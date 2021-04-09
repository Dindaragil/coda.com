@extends('layout/main')

@section('title', 'Owners | Coda.com')

@section('container')

<div class="container">
    <div style="margin-top: 75px;">
        <div class="">
            <h2>Owners</h2>
        </div>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div class="ml-auto mb-2">
            <a href="owner_create" class="btn btn-success">Add New</a>
        </div>

        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Full name</th>
                    <th>Email address</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($owner as $ow)
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$ow->id }}</td>
                    <td>{{$ow->nama_lengkap }}</td>
                    <td>{{$ow->email }}</td>
                    <td>{{$ow->alamat }}</td>
                    <td>
                        <form action="{{ url('owner_destroy', $ow->id )}}" method="post">
                            {{ csrf_field() }}
                            @method('delete')
                            <a href="{{url('owner_edit', $ow->id)}}" class="btn btn-sm btn-primary">Edit</a>
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you Sure?')">Delete</button>
                            <a href="{{ url('merchant_create', $ow->id)}}" class="btn btn-sm btn-success">Add Merchant</a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
