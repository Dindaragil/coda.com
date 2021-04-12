@extends('layout/main')

@section('title', 'Categories | Coda.com')

@section('container')


<div class="container">
    <div style="margin-top: 75px; margin-bottom: 75px;">
        <div class="col-xs-6">
            <h2>Categories</h2>
        </div>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div class="ml-auto mb-2">
            <a href="/kategori_create" class="btn btn-outline-primary">Add New</a>
        </div>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Categories</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $kategori as $kg )
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$kg->id}}</td>
                    <td>{{$kg->nama}}</td>
                    <td>

                        <form action="{{ url('kategori_destroy', $kg->id )}}" method="post">
                            {{ csrf_field() }}
                            @method('delete')
                            <a href="{{url('kategori_edit', $kg->id)}}" class="btn btn-sm btn-primary">Edit</a>
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
