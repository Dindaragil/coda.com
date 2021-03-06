<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | Coda.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">

            <div class="col-md-4"></div>
            <div class="col-md-4" style="margin-top: 80px;">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <div class="card text-center">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
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
                            @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                            @endif
                            @if (Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                            @endif
                            <div class="mb-3">
                                <label for="inputEmail1" class="form-label">
                                    <h6>Email address</h6>
                                </label>
                                <input type="email" autocomplete="current-email" class="form-control" id="inputEmail1" name="email" placeholder="Your Email" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword1" class="form-label">
                                    <h6>Password</h6>
                                </label>
                                <input type="password" autocomplete="current-password" class="form-control" id="inputPassword1" name="password" placeholder="Your Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>

                        <div class="mt-3">
                            <p>Don't have an account?</p>
                            <a href="{{ route('register') }}" class="ml-2">Register</a>

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
