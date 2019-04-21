<!DOCTYPE html>
<html lang="en">
    <head>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'IT') }}</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A premium admin dashboard template by mannatthemes" name="description" />
        <meta content="Mannatthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">

        <!-- App css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/icons.css" rel="stylesheet" type="text/css" />
        <link href="css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="account-body">

        <!-- Log In page -->
        <div class="row vh-100">
            <div class="col-lg-3  pr-0">
                <div class="card mb-0 shadow-none">
                    <div class="card-body">

                        <div class="px-3">
                            <div class="media">
                                <a href="index.html" class="logo logo-admin"><img src="images/atpLogoSmall.png" height="55" alt="logo" class="my-3"></a>
                                <div class="media-body ml-3 align-self-center">


                                    <p class="text-muted mb-0">Sign in to continue.</p>
                                </div>
                            </div>


                                    <form method="POST" action="{{ route('login') }}" class="form-horizontal" >
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="username">{{ __('E-Mail Address') }}</label>





                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                        </div>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                                        @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif

                                    </div>
                                </div>

                                <div class="form-group">



                                    <label for="userpassword">{{ __('Password') }}</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-key font-16"></i></span>
                                        </div>

                                        <input type="password" class="form-control" id="userpassword" placeholder="Enter password"  name="password" required autocomplete="current-password">
                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>

                                <div class="form-group row mt-4">
                                    <div class="col-sm-6">
                                        <div class="custom-control custom-checkbox">



                                            <input type="checkbox" class="custom-control-input" name="remember" id="customControlInline" {{ old('remember') ? 'checked' : '' }} >
                                            <label class="custom-control-label" for="customControlInline">{{ __('Remember Me') }}</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-9 p-0 d-flex justify-content-center">
                <div class="accountbg d-flex align-items-center" style="background: url('images/background_2.png');">
                    <div class="account-title text-white text-center">
                        <img src="images/atpLogo.png" alt="" style="width:250px">
                        <h4 class="mt-3">Welcome Plese Login</h4>


                    </div>
                </div>
            </div>
        </div>
        <!-- End Log In page -->


        <!-- jQuery  -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/metisMenu.min.js"></script>
        <script src="js/waves.min.js"></script>
        <script src="js/jquery.slimscroll.min.js"></script>

        <!-- App js -->
        <script src="js/app.js"></script>

    </body>
</html>
