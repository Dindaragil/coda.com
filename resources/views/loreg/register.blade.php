<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register | Coda.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" style="margin-top: 10px;">
                <div class="card text-center">
                    <div class="card-header">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/register_create')}}" method="post">
                        {{ csrf_field() }}
                        <div class="mb-3">
                                <label for="inputNamaLengkap" class="form-label"><h6>Full name</h6></label>
                                <input type="text" class="form-control" id="inputNamaLengkap" name="nama_lengkap" placeholder="Your Full Name">
                            </div>
                            <div class="mb-3">
                                <label for="inputEmail" class="form-label"><h6>Email address</h6></label>
                                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="email" placeholder="Your Email">
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword" class="form-label"><h6>Password</h6></label>
                                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Your Password">
                            </div>
                            <div class="mb-3">
                                <label for="inputAlamat" class="form-label"><h6>Address</h6></label>
                                <input type="text" class="form-control" id="inputAlamat" name="alamat" placeholder="Your Address">
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                        <div class="mt-3">
                            <p>Already have account?</p>
                            <a href="{{url('/login')}}" class="ml-2">Login</a>

								</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
