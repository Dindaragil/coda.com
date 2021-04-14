@extends('layout/main')

@section('title', 'Add User | Coda.com')

@section('container')


<div class="container">
    <div style="margin-top: 75px; margin-bottom: 75px;">
        <div class="col-xs-6 mb-4">
            <h2>Add New User</h2>
        </div>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{url('user_store')}}" method="post">
            {{ csrf_field() }}
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
                <input type="namaLengkap" class="form-control" id="inputNamaLengkap" name="nama_lengkap" placeholder="User Full Name" required>
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">
                    <h6>Email address</h6>
                </label>
                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="email" placeholder="User Email" required>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">
                    <h6>Password</h6>
                </label>
                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="User Password" required>
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">
                    <h6>Confirm Password</h6>
                </label>
                <input type="password" name="password_confirmation" class="form-control" id="confirmPassword" placeholder=" Confirm User Password" required>
            </div>
            <div class="mb-3">
                <label for="inputAlamat" class="form-label">
                    <h6>Address</h6>
                </label>
                <input type="alamat" class="form-control" id="inputAlamat" name="alamat" placeholder="User Address" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</div>

@endsection
