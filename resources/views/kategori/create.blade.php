@extends('layout/main')

@section('title', 'Add Category | Coda.com')

@section('container')


<div class="container">
    <div style="margin-top: 75px; margin-bottom: 75px;">
        <div class="col-xs-6 mb-4">
            <h2>Add New Category</h2>
        </div>

        <form method="post" action="{{url('kategori_store')}}">
            {{ csrf_field() }}
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Create a new one please" name="nama">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</div>

@endsection
