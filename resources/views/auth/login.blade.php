
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title>Skooleo Control Central</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/toggle/switchery.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/switch.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-switch.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.min.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/login-register.min.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                    <div class="text-center mb-1">
                        <img src="{{ asset('skooleo-logo.png') }}" alt="Flutterwave logo" width="60%" class="img-responsive">
                    </div>
                    <div class="font-large-1  text-center"></div>
                </div>
                <div class="card-content">

                    <div class="card-body">

                        @if (Route::has('login'))
                            @auth
                                <a class="btn btn-lg btn-success" href="{{ url('/home') }}">Dashboard</a>
                            @else
                                @if(session("login_error"))
                                    <div class="alert alert-danger">
                                        <strong>Oopss!</strong> {{ session("login_error") }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group row mb-0">
                                        <div class="col-md-12 text-center">
                                            <br><br>
                                            <h4>Click the button to login.</h4>
                                            <a href="{{ route('login.provider', 'google') }}">
                                                <img class="img-responsive" src="{{ asset('theme-assets/images/google.jpg') }}" alt="Google" height="auto" width="80%">
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            @endauth
                        @endif

                    </div>

                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-2 "></p>
                    <div class="text-center">
                        <a href="#" class="btn btn-social-icon round mr-1 mb-1 btn-facebook"><span class="ft-facebook"></span></a>
                        <a href="#" class="btn btn-social-icon round mr-1 mb-1 btn-twitter"><span class="ft-twitter"></span></a>
                        <a href="#" class="btn btn-social-icon round mr-1 mb-1 btn-instagram"><span class="ft-instagram"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/switch.min.js') }}" type="text/javascript"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/core/app.min.js') }}" type="text/javascript"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/forms/form-login-register.min.js') }}" type="text/javascript"></script>
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->
</html>
