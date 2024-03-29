
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title>Skooleo Control Central</title>
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/error.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu 1-column bg-gradient-directional-danger blank-page blank-page" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container bg-hexagons-danger">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-lg-4 col-md-6 col-10 p-0">
                <div class="card-header bg-transparent border-0">
                    <h1 class="error-code text-center mb-2 white">{{ $statusCode }}</h1>
                    <h3 class="text-uppercase text-center white">Internal Server Error !</h3>
                </div>
                <div class="card-content">
                    <fieldset class="row py-2">
                        <div class="input-group col-12">
                            <input type="text" class="form-control form-control-xl input-xl border-grey border-lighten-1 box-shadow-4" placeholder="How can we help?" aria-describedby="button-addon2">
                            <span class="input-group-append" id="button-addon2">
                               <button class="btn btn-lg btn-danger border-grey border-lighten-1 box-shadow-4" type="button"><i class="ft-search "></i></button>
                           </span>
                       </div>
                    </fieldset>
                    <div class="row py-2 text-center">
                        <div class="col-12">
                            <a href="{{ URL::previous() }}" class="btn btn-white danger box-shadow-4"><i class="ft-home"></i> Back to Home</a>
                        </div>

                    </div>
                </div>
                <div class="card-footer bg-transparent">
                    <div class="row">
                        <p class="text-muted text-center col-12 py-1 white">
                            Skooleo &copy;<script>document.write(new Date().getFullYear());</script>
                        </p>

                        <div class="col-12 text-center">
                                <a href="#" class="font-large-1 white p-2 "><span class="ft-facebook"></span></a>
                                <a href="#" class="font-large-1 white "><span class="ft-twitter"></span></a>
                                <a href="#" class="font-large-1 white p-2"><span class="ft-instagram"></span></a>
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
