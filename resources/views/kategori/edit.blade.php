@extends('layout/main')

@section('title', 'Change Category | Coda.com')

@section('container')


<div class="container">
    <div style="margin-top: 75px;">
        <div class="col-xs-6 ">
            <h2>Change Category</h2>
        </div>
        @foreach( $kategori as $kg )
        <form method="post" action="{{url('kategori_update', $kg->id)}}">
            {{ csrf_field() }}
            @method('put')
            <div class="input-group mb-3">
                <input type="text" class="form-control " placeholder="Create a new one please" name="nama" value="{{$kg->nama}}">
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        @endforeach
    </div>

</div>

@endsection
