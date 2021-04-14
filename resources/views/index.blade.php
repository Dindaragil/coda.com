@extends('layout/main')

@section('title', 'Coda.com')

@section('container')

<div class="container">
    <div class="row" style="margin-top: 75px;">
        <div class="col-10 mt-3">
            <h2>Hello, {{ Auth::user()->nama_lengkap }}!!!!</h2>
        </div>
    </div>
</div>

@endsection
