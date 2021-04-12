@extends('layout/main')

@section('title', 'Coda.com')

@section('container')

<div class="row">
<div class="w3-sidebar w3-light-gray w3-bar-block" style="width:20%; margin-top: 70px;">
            <h3 class="w3-bar-item">Categories</h3>
            <a href="#" class="w3-bar-item w3-button">Drum</a>
            <a href="#" class="w3-bar-item w3-button">Guitar</a>
            <a href="#" class="w3-bar-item w3-button">Piano</a>
        </div>
<div class="" style="margin-left:20% ">
@foreach( $produk as $pr )

            <div class="row" style="margin-top: 75px;">
            <div class="card-group">
                <div class="col-md-3" style="margin-left: 10px;">
                    <div class="card" style="width:18rem;">
                        <img class="card-img-top" src="/image/{{$pr->gambar}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$pr->produk_nama}}</h5>
                            <p class="card-text">{{$pr->deskripsi}}</p>
                            <a href="#" class="btn btn-dark">Buy</a>
                            <a href="#" class="btn btn-primary">Add to cart</a>
                         </div>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
            </div>

@endsection
