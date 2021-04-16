@extends('layout/main')

@section('title', 'Cart | Coda.com')

@section('container')
<div class="container">
        <div class="row" style="margin-top: 75px;">
            <div class="col-xs-6">
                <h2>Check Out</h2>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <table class="table table">
                <thead class="thead-dark">
                    <tr>
                        <th> </th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <td>
                        <img src="D:\Ibnu\Dignitas\startbootstrap-sb-admin-2-gh-pages\img\pen_STAR_maple_2021.png"
                            class="img-thumbnail" alt="...">
                    </td>
                    <td>TAMA STAR Maple Drum Kits</td>
                    <td>Rp.20.000.000,-</td>
                    <td>
                        <input type="number" value="1" min="1" max="1000" step="1" />
                    </td>
                    <td>Rp.20.000.000,-</td>
                </tbody>
            </table>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="ml-auto">
                <div class="card text-center" style="width: 30rem;">
                    <div class="card-header">
                        <h4>Totals</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Total
                                <span class="badge badge-primary badge-pill">Rp. 20.000.000,-</span>
                            </li>
                        </ul>
                        <button type="submit" class="btn btn-dark" style="margin-top: 10px;">Check Out</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./src/input-spinner.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $("input[type='number']").inputSpinner()
    </script>
@endsection
