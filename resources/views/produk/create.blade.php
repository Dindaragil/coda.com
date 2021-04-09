@extends('layout/main')

@section('title', 'Add Product | Coda.com')

@section('container')


<div class="container">
    <div style="margin-top: 75px; margin-bottom: 75px;">
        <div class="col-xs-6 mb-4">
            <h2>Add New Product</h2>
        </div>

        <form method="post" action="{{url('produk_store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row mb-3">
            <div class="col">
                    <label class="form-label h6">Merchant ID</label>
                    <input type="text" class="form-control" placeholder="merchant ID" name="id_merchant">
                </div>
                <div class="col">
                    <label class="form-label h6">Category ID</label>
                    <input type="text" class="form-control" placeholder="category ID" name="id_kategori">
                </div>
            </div>
            <label class="form-label h6">Product Name</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="product name" name="nama">
            </div>
            <label class="form-label h6">Description</label>
            <div class="mb-3">
                <textarea class="form-control" rows="3" placeholder="product description" name="deskripsi"></textarea>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label h6">Stock</label>
                    <input type="text" class="form-control" placeholder="product stock" name="stok">
                </div>
                <div class="col">
                    <label class="form-label h6">Price</label>
                    <input type="text" class="form-control" placeholder="product price" name="harga">
                </div>
            </div>
            <label class="form-label h6">Picture</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control" placeholder="product picture" name="gambar">
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
       

    </div>

</div>

@endsection
