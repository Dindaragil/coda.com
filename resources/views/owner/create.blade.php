@extends('layout/main')

@section('title', 'Add Owner | Coda.com')

@section('container')


<div class="container">
    <div style="margin-top: 75px;">
        <div class="col-xs-6 mb-4">
            <h2>Add New Owner</h2>
        </div>
        @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
        <form action="{{url('owner/store')}}" method="post">
                        {{ csrf_field() }}
                        <div class="mb-3">
                                <label for="inputNamaLengkap" class="form-label"><h6>Full name</h6></label>
                                <input type="namaLengkap" class="form-control" id="inputNamaLengkap" name="nama_lengkap" placeholder="Your Full Name">
                            </div>
                            <div class="mb-3">
                                <label for="inputEmail" class="form-label"><h6>Email address</h6></label>
                                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="email" placeholder="Your Email">
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword" class="form-label"><h6>Password</h6></label>
                                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Your Password">
                            </div>
                            <div class="mb-3">
                                <label for="inputAlamat" class="form-label"><h6>Address</h6></label>
                                <input type="alamat" class="form-control" id="inputAlamat" name="alamat" placeholder="Your Address">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
    </div>

</div>

@endsection
