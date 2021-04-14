@extends('layout/main')

@section('title', 'Update Product | Coda.com')

@section('container')


<div class="container">
    <div style="margin-top: 75px; margin-bottom: 75px;">
        <div class="col-xs-6 mb-4">
            <h2>Update Product</h2>
        </div>

        @foreach( $produk as $pr )
        <form method="post" action="{{url('/produk_update', $pr->id)}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('put')
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
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label h6">Merchant ID</label>
                    <input type="text" class="form-control" placeholder="merchant ID" name="id_merchant" value="{{$pr->id_merchant}}" readonly>
                </div>
                <div class="col">
                    <label class="form-label h6">Category ID</label>
                    <input type="text" class="form-control" placeholder="category ID" name="id_kategori" value="{{$pr->id_kategori}}" readonly>
                </div>
            </div>
            <label class="form-label h6">Product Name</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="product name" name="nama" value="{{$pr->nama}}">
            </div>
            <label class="form-label h6">Description</label>
            <div class="mb-3">
                <textarea class="form-control" input type="text" rows="3" placeholder="product description" name="deskripsi" >{{$pr->deskripsi}}</textarea>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label h6">Stock</label>
                    <input type="text" class="form-control" placeholder="product stock" name="stok" value="{{$pr->stok}}">
                </div>
                <div class="col">
                    <label class="form-label h6">Price</label>
                    <input type="text" class="form-control" placeholder="product price" name="harga" value="{{$pr->harga}}">
                </div>
            </div>
            <label class="form-label h6">Picture</label> <br>
            @foreach( $produk as $pr )
            <img src="/image/{{$pr->gambar}}" alt="Pict" width="100px" class="mb-3">
            @endforeach
            <div class="input-group mb-3">
                <input type="file" class="form-control" placeholder="product picture" name="gambar">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @endforeach


    </div>

</div>

@endsection
