@extends('layout/main')

@section('title', 'Update Owners | Coda.com')

@section('container')


<div class="container">
    <div style="margin-top: 75px; margin-bottom: 75px;">
        <div class="col-xs-6 ">
            <h2>Update Owner</h2>
        </div>

        @foreach( $owner as $ow )
        <form action="{{url('owner_update', $ow->id)}}" method="post">
            {{ csrf_field() }}
            @method('put')
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
            <div class="mb-3">
                <label for="inputNamaLengkap" class="form-label">
                    <h6>Full name</h6>
                </label>
                <input type="text" class="form-control" id="inputNamaLengkap" name="nama_lengkap" placeholder="Your Full Name" value="{{$ow->nama_lengkap}}" required>
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">
                    <h6>Email address</h6>
                </label>
                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="email" placeholder="Your Email" value="{{$ow->email}}" required>
            </div>

            <div class="mb-3">
                <label for="inputAlamat" class="form-label">
                    <h6>Address</h6>
                </label>
                <input type="text" class="form-control" id="inputAlamat" name="alamat" placeholder="Your Address" value="{{$ow->alamat}}" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @endforeach
    </div>

</div>

@endsection
