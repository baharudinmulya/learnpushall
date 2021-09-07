<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title>Log In | Minible - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">

        <div class="home-btn d-none d-sm-block">
            <a href="index.html" class="text-dark"><i class="mdi mdi-home-variant h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        
                    </div>
                </div>
               
                <div class="row align-items-center justify-content-center">
                
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                           
                            <div class="card-body p-4"> 
                            @if(session('message'))
                           <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                               {{session('message')}}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                            @endif
                            <div class="text-center">
                                <a href="index.html" class="mb-5 d-block auth-logo">
                                    <img src="assets/images/pt.aja.jpeg" alt="" height="100" class="logo logo-dark">
                                    <img src="assets/images/logo-light.png" alt="" height="22" class="logo logo-light">
                                </a>
                            </div>
                                <div class="text-center mt-2">

                                    <h5 class="text-primary">Selamat Datang !</h5>
                                    <p class="text-muted">Masuk untuk melanjutkan ke Aplikasi Pengadaan Barang.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="{{ route('userlogin') }}" method='post'>
                                    @csrf
                                    @method('POST')
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" value="" placeholder="Enter username">
                                        </div>
                
                                        <div class="form-group">
                                            <div class="float-right">
                                                <a href="{{route('userforgot')}}" class="text-muted">Lupa kata sandi?</a>
                                            </div>
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                                        </div>
                
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="auth-remember-check">
                                            <label class="custom-control-label" for="auth-remember-check">Remember me</label>
                                             <div class="float-right">
                                                <a href="{{ route('personal') }}" class="text-muted">Daftar member?</a>
                                            </div>
                                        </div>  
                                        
                                        <div class="mt-3 text-right">
                                            <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Masuk</button>
                                        </div>
            
                                        

                                      
                                    </form>
                                </div>
            
                            </div>
                        </div>

                      
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/minible/layouts/vertical/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Feb 2021 08:44:47 GMT -->
</html>
