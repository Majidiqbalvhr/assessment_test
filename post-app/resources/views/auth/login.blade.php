<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Pay Mob</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/media/logos/PayMob_Favicon.png">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <style>
        body {
            background-color: black; /* Set background color to black */
            color: white; /* Set text color to white */
        }
    </style>
</head>

<body>
<div class="bg-overlay" style="background-image: url('assets/images/back-login.jpeg'); background-size: cover;"></div>
<div class="wrapper-page">
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">

                <div class="text-center mt-4">
                    <div class="mb-3">
                        <a href="index.html" class="auth-logo">
                            <img src="assets/media/logos/favicon.ico" height="80" class="logo-dark mx-auto" alt="">
                            <img src="assets/images/logo-favicon.ico" height="30" class="logo-light mx-auto" alt="">
                        </a>
                    </div>
                </div>
                @if(session('notificationMessage'))
                    <div class="alert alert-danger" id="notificationMessage">
                        {{ session('notificationMessage') }}
                    </div>
                    <script>
                        setTimeout(function() {
                            $('#notificationMessage').fadeOut('slow');
                        }, 5000);
                    </script>
                @endif
                <h4 class="text-muted text-center font-size-18"><b>Sign In</b></h4>

                <div class="p-3">
                    <form class="form-horizontal mt-3" method="post" action="{{route('login.process')}}">
                        @csrf
                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control" name="email" type="text" required="" placeholder="Enter the email" value="{{ old('email') }}">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="form-label ms-1" for="customCheck1">Remember me</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3 text-center row mt-3 pt-1">
                            <div class="col-12">
                                <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log
                                    In</button>
                            </div>
                        </div>

                        <div class="form-group mb-0 row mt-2">
                            <div class="col-sm-5 mt-3">
                                <a href="{{ route('create.registration') }}" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end -->
            </div>
            <!-- end cardbody -->
        </div>
        <!-- end card -->
    </div>
    <!-- end container -->
</div>
<!-- end -->

<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>

<script src="assets/js/app.js"></script>

</body>

</html>
