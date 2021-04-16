@extends('layout/main')

@section('title', 'Coda.com')

@section('container')

<div class="row">
<div class="w3-sidebar w3-light-gray w3-bar-block" style="width:20%; margin-top: 70px;">
            <h3 class="w3-bar-item">Categories</h3>
            
            <a href="#" class="w3-bar-item w3-button"></a>
            <a href="#" class="w3-bar-item w3-button">Guitar</a>
            <a href="#" class="w3-bar-item w3-button">Piano</a>
        </div>
<div class="" style="margin-left:20% ">


            <div class="row" style="margin-top: 75px; margin-bottom: 75px;">
            @foreach( $produk as $pr )
                <div class="col-md-3" style="margin-left: 10px; margin-top: 25px;">
                <div class="card-group">
                    <div class="card" style="width:18rem; height:20rem;">
                        <img class="card-img-top" src="/image/{{$pr->gambar}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$pr->nama}}</h5>
                            <p class="card-text"></p>
                            <form action="{{url('/transaksi_add', $pr->id)}}" method="post">
              @csrf
              <input type="hidden" name="qty" value="1">
              
              <button class="btn btn-dark" type="submit">
              Buy
              </button>
              <a href="{{url('detail', $pr->id)}}" class="btn btn-primary">Detail</a>
            </form>
                            <!-- <a href="{{url('/transaksi_add', $pr->id)}}" class="btn btn-dark">Buy</a> -->
                            
                         </div>
                    </div>
                </div>
                </div>
                @endforeach
                </div>

            </div>

@endsection
