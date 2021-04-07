@extends('layout/main')

@section('title', 'User | Coda.com')

@section('container')

<!-- <div class="container">
        <div class="row">
            <div class="col-10">
                <h1 class="mt-3">User List</h1>
            </div>
        </div>

        <table class="table">
        <thead class="table-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">ID</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Alamat</th>
        <th scope="col">Aksi</th>
        </tr>
        </thead>

        <tbody>
            @foreach($users as $us)
        <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$us->id }}</td>
        <td>{{$us->nama_lengkap}}</td>
        <td>{{$us->email}}</td>
        <td>{{$us->alamat}}</td>
        <td>
        <a href="" class="badge bg-info">edit</a>
        <a href="" class="badge bg-danger">delete</a>
        </td>
        </tr>
        @endforeach
        </tbody>

        </table>
    </div> -->
    <div class="container">
        <div style="margin-top: 75px;">
            <div class="">
                <h2>Users</h2>
            </div>
            <div class="ml-auto mb-2">
                <a href="user/create" class="btn btn-success">Add New</a>
            </div>
            @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
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
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you Sure?')">Delete</button>
                  </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
