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
                <h4>{{$pr->produk_nama}}</h4>
                <div class="row">
                    <div class="col-md-3">
                        <p>Stock {{$pr->stok}}</p>
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
                <h3>
                Rp {{ number_format($pr->harga, 2) }},-
                </h3>
                <hr>
                <h5>Detail</h5>
                <hr>
                <div>
                    <p class="lh-lg">{{$pr->deskripsi}}</p>
                </div>
                <hr>
                <div class="card text-white bg-secondary text-center">
                    <h4>{{$pr->merchant_nama}}</h4>
                </div>
                <hr>
                <div class=".ml-auto">
                @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
        @endif
                <form action="{{url('/cart_store', $pr->id)}}" method="post">
              @csrf
              <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
              <input type="hidden" name="id_produk" value="{{$pr->id}}">
              <input type="text" class="form-control mb-2" name="qty">
              
              <button class="btn btn-block btn-primary" type="submit">
              <i class="fa fa-shopping-cart"></i> Tambahkan Ke Keranjang
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
