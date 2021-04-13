@extends('layout/main')

@section('title', 'Coda.com')

@section('container')

<div class="row">
<div class="w3-sidebar w3-light-gray w3-bar-block" style="width:20%; margin-top: 70px;">
            <h3 class="w3-bar-item">Categories</h3>
            @foreach( $produk as $pr )
            <a href="#" class="w3-bar-item w3-button">{{$pr->kategori_nama}}</a>
            <a href="#" class="w3-bar-item w3-button">Guitar</a>
            <a href="#" class="w3-bar-item w3-button">Piano</a>
        </div>
<div class="" style="margin-left:20% ">


            <div class="row" style="margin-top: 75px; margin-bottom: 75px;">

                <div class="col-md-3" style="margin-left: 10px; margin-top: 25px;">
                <div class="card-group">
                    <div class="card" style="width:18rem; height:20rem;">
                        <img class="card-img-top" src="/image/{{$pr->gambar}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$pr->nama}}</h5>
                            <p class="card-text"></p>
                            <a href="{{url('cart', $pr->id)}}/{{Session::get('id')}}" class="btn btn-dark">Buy</a>
                            <a href="{{url('detail', $pr->id)}}" class="btn btn-primary">Detail</a>
                         </div>
                    </div>
                </div>
                </div>
                @endforeach
                </div>

            </div>

@endsection
