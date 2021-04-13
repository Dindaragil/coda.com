@extends('layout/main')

@section('title', 'Cart | Coda.com')

@section('container')

<div class="container">
        <div class="row" style="margin-top: 75px;">
            <div class="col-xs-6">
                <h2>Cart</h2>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <table class="table table">
                <thead class="thead-dark">
                    <tr>
                        <th> </th>
                        <th>No Invoice</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($itemcart->detail as $detail)
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                            </label>
                        </div>
                    </td>
                    <td>{{ $itemcart->no_invoice }}</td>
                    <!-- <td>
                        <img src="D:\Ibnu\Dignitas\startbootstrap-sb-admin-2-gh-pages\img\pen_STAR_maple_2021.png"
                            class="img-thumbnail" alt="...">
                    </td> -->
                    <td>{{ $detail->produk->nama }}</td>
                    <td>{{ number_format($detail->harga, 2) }}</td>
                    <td>
                    <div class="btn-group" role="group">
                    <form action="{{ route('transaksiproduk.update',$detail->id) }}" method="post">
                    @method('patch')
                    @csrf()
                      <input type="hidden" name="param" value="kurang">
                      <button class="btn btn-primary btn-sm">
                      -
                      </button>
                    </form>
                    <button class="btn btn-outline-primary btn-sm" disabled="true">
                    {{ number_format($detail->qty, 2) }}
                    </button>
                    <form action="{{ route('cartdetail.update',$detail->id) }}" method="post">
                    @method('patch')
                    @csrf()
                      <input type="hidden" name="param" value="tambah">
                      <button class="btn btn-primary btn-sm">
                      +
                      </button>
                    </form>
                  </div>
                    </td>
                    <td>{{ number_format($detail->subtotal, 2) }}</td>
                    <td>
                        <!-- <a href="#" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a> -->
                        <form action="{{ route('cartdetail.destroy', $detail->id) }}" method="post" style="display:inline;">
                  @csrf
                  {{ method_field('delete') }}
                  <button type="submit" class="btn btn-sm btn-danger mb-2">
                  <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                  </button>
                </form>
                    </td>
                </tbody>
                
            </table>
        </div>
        <div class="row" style="margin-top: 10px;">
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
        </div>
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
