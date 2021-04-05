@extends('layout/main')

@section('title', 'Categories | Coda.com')

@section('container')


    <div class="container">
            <div style="margin-top: 75px;">
            <div class="col-xs-6">
                <h2>Categories</h2>
            </div>
            <div class="ml-auto mb-2">
                <a href="/kategori/create" class="btn btn-success">Add New</a>
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
                        <th>Categories</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach( $kategori as $kg )
                    <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$kg->nama}}</td>
                        <td>

                            <form action="{{ url('kategori_destroy', $kg->id )}}" method="post">
                    {{ csrf_field() }}
                    @method('delete')
                    <a href="{{url('kategori_edit', $kg->id)}}" class="btn btn-sm btn-primary">Edit</a>
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
