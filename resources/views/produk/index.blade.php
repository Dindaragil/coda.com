@extends('layout/main')

@section('title', 'Products | Coda.com')

@section('container')

<div class="container">
    <div style="margin-top: 75px; margin-bottom: 75px;">
        <div class="col-xs-6">
            <h2>Products</h2>
        </div>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <!-- <div class="ml-auto mb-2">
            <a href="produk_create" class="btn btn-outline-primary">Add New</a>
        </div> -->
        <table class="table table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Picture</th>
                    <th>Category</th>
                    <th>Merchant</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $produk as $pr )

                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$pr->id}}</td>
                    <td>{{$pr->produk_nama}}</td>
                    <td><details><summary>Product Description</summary> <p>{{$pr->deskripsi}}</p></details></td>
                    <td>{{$pr->stok}}</td>
                    <td>{{$pr->harga}}</td>
                    <td><img src="/image/{{$pr->gambar}}" alt="Pict" width="100px"></td>
                    <td>{{$pr->kategori_nama}}</td>
                    <td>{{$pr->merchant_nama}}</td>
                    <td>
                    <a href="{{url('produk_edit', $pr->id)}}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ url('produk_destroy', $pr->id )}}" method="post">
                            {{ csrf_field() }}
                            @method('delete')

<button type="submit" class="btn btn-sm btn-outline-primary mt-2" onclick="return confirm('Are you Sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
