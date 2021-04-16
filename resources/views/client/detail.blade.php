@extends('layout/main')

@section('title', 'Detail | Coda.com')

@section('container')

<div class="container">
        <div class="row" style="margin-top: 150px; margin-bottom: 75px;">
        @foreach( $produk as $pr )
         <div class="col-md-6">
                <img src="/image/{{$pr->gambar}}" width="500">
            </div>
            <div class="col-md-6">
                <h2>{{$pr->produk_nama}}</h2>
                <div class="row">
                    <div class="col-md-3">
                        <h6>Stock {{$pr->stok}}</h6>
                    </div>
                    <div class="col-md-3">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                </div>
                <h4>
                Rp {{ number_format($pr->harga, 2) }},-
                </h4>
                <hr>
                <h5>Detail</h5>
                <hr>
                <div>
                    <p class="lh-lg">{{$pr->deskripsi}}</p>
                </div>
                <hr>
                <div class=" text-secondary  text-center">
                    <h5>{{$pr->merchant_nama}}</h5>
                </div>
                <hr>
                <div class=".ml-auto">
                @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
        @endif
                <form action="{{url('/transaksi_add', $pr->id)}}" method="post">
              @csrf
              
              <input type="text" class="form-control mb-2" name="qty" placeholder="Wanna buy some?">
              
              <button class="btn btn-block btn-primary" type="submit">
              <i class="fa fa-shopping-cart mr-2"></i> Add to Cart
              </button>
            </form>
                <!-- <a href="{{url('cart')}}/{{Session::get('id')}}" class="btn btn-primary btn-lg " role="button" >Add to cart</a>
                    <a href="#" class="btn btn-success btn-lg " role="button">Buy</a> -->
                </div>
            </div>
            @endforeach
        </div>
        <script>
        $("input[type='number']").inputSpinner()
    </script>


@endsection
