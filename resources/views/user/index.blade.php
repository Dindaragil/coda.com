@extends('layout/main')

@section('title', 'User | Coda.com')

@section('container')

<div class="container">
    <div style="margin-top: 150px; margin-bottom: 150px;">
        <div class="">
            <h2>Users</h2>
        </div>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="ml-auto mb-2">
            <a href="user_create" class="btn btn-outline-primary">Add New</a>
        </div>

        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Full name</th>
                    <th>Email address</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $us)
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$us->nama_lengkap }}</td>
                    <td>{{$us->email}}</td>
                    <td>{{$us->alamat}}</td>
                    <td>
                        <form action="{{ url('user_destroy', $us->id )}}" method="post">
                            {{ csrf_field() }}
                            @method('delete')
                            <a href="{{url('user_edit', $us->id)}}" class="btn btn-sm btn-primary">Edit</a>
                            <button type="submit" class="btn btn-sm btn-outline-primary" onclick="return confirm('Are you Sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
