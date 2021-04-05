@extends('layout/main')

@section('title', 'Update User | Coda.com')

@section('container')


<div class="container">
    <div style="margin-top: 75px;">
        <div class="col-xs-6 ">
            <h2>Update User</h2>
        </div>
        @foreach( $users as $us )
        <form action="{{url('user_update', $us->id)}}" method="post">
                        {{ csrf_field() }}
                        @method('put')
                        <div class="mb-3">
                                <label for="inputNamaLengkap" class="form-label"><h6>Full name</h6></label>
                                <input type="text" class="form-control" id="inputNamaLengkap" name="nama_lengkap" placeholder="Your Full Name" value="{{$us->nama_lengkap}}">
                            </div>
                            <div class="mb-3">
                                <label for="inputEmail" class="form-label"><h6>Email address</h6></label>
                                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="email" placeholder="Your Email" value="{{$us->email}}">
                            </div>

                            <div class="mb-3">
                                <label for="inputAlamat" class="form-label"><h6>Address</h6></label>
                                <input type="text" class="form-control" id="inputAlamat" name="alamat" placeholder="Your Address" value="{{$us->alamat}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        @endforeach
    </div>

</div>

@endsection
