@extends('layout/main')

@section('title', 'Cart | Coda.com')

@section('container')

<div class="container">
        <div class="row" style="margin-top: 150px;">
            <div class="col-xs-6">
                <h2>Cart</h2>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <table class="table table">
                <thead class="thead-dark">
                    <tr>
                       
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($itemcart as $itemcart)
                <tr>
                    
                    <!-- <td>
                        <img src="D:\Ibnu\Dignitas\startbootstrap-sb-admin-2-gh-pages\img\pen_STAR_maple_2021.png"
                            class="img-thumbnail" alt="...">
                    </td> -->
                    <td>{{ $itemcart->produk_nama }}</td>
                    <td>Rp {{ number_format($itemcart->harga, 2) }},-</td>
                    <td><div class="btn-group" role="group">
                    <form action="{{ route('cart_update.update', $itemcart->id_transaksi_produk) }}" method="post">
                    @method('patch')
                    @csrf()
                      <input type="hidden" name="param" value="kurang">
                      <button class="btn btn-primary btn-sm">
                      -
                      </button>
                    </form>
                    <button class="btn btn-outline-primary btn-sm" disabled="true">
                    {{$itemcart->qty }}
                    </button>
                    <form action="{{ route('cart_update.update', $itemcart->id_transaksi_produk) }}" method="post">
                    @method('patch')
                    @csrf()
                      <input type="hidden" name="param" value="tambah">
                      <button class="btn btn-primary btn-sm">
                      +
                      </button>
                    </form>
                  </div></td>
                    <td>{{ $itemcart->subtotal }}</td>
                    <td>
                    <form action="{{url('/cart/delete', $itemcart->id_transaksi_produk)}}" method="post">
                            {{ csrf_field() }}
                            @method('delete')
                            <button type="submit"  class="btn btn-sm-outline-dark" onclick="return confirm('Are you Sure?')"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                        </form>    
                        </td>
                </tr>
                    <!-- <div class="btn-group" role="group">

                  </div> -->
                   
                    @endforeach
                </tbody>
                
            </table>
        </div>
        <!-- <div class="row" style="margin-top: 10px;">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header">
                        <h4>Totals</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                        <h3>Rp. 40.000.000,-</h3>
                        </ul>
                        <button type="submit" class="btn btn-dark" style="margin-top: 10px;">Buy</button>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row" style="margin-top: 25px;"></div>
    </div>
    <script src="./src/input-spinner.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $("input[type='number']").inputSpinner()
    </script>

@endsection
