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
                        <th> </th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                            </label>
                        </div>
                    </td>
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
                    <td>
                        <a href="#" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    </td>
                </tbody>
                <tbody>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                            </label>
                        </div>
                    </td>
                    <td>
                        <img src="D:\Ibnu\Dignitas\startbootstrap-sb-admin-2-gh-pages\img\pen_STAR_walnut_2021.png"
                            class="img-thumbnail" alt="...">
                    </td>
                    <td>TAMA STAR Walnut Drum Kits</td>
                    <td>Rp.20.000.000,-</td>
                    <td>
                        <input type="number" value="1" min="1" max="1000" step="1" />
                    </td>
                    <td>Rp.20.000.000,-</td>
                    <td>
                        <a href="#" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
