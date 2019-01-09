<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ url('images/favicon.ico') }}">

        <!-- App css -->
        <link href="{{ url('plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" />
        <link href="{{ url('css/bootstrap.min') }}.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('css/core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('css/components.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('css/pages.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('css/menu.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('css/responsive.css') }}" rel="stylesheet" type="text/css" />

        <style>
            .account-pages .alert {
                max-width: 460px;
                margin: 20px auto;
            }
        </style>

        <script src="{{ url('js/modernizr.min.js') }}"></script>

    </head>


    <body class="bg-accpunt-pages">

        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="account-pages">
                                @if (session('status'))
                                <div class="alert alert-danger alert-dismissible fade in m-b-20" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ session('status') }}
                                </div>
                                @endif
                                <div class="account-box">
                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
                                            <a href="{{ url('admin') }}" class="text-success">
                                                <span><img src="{{ url('images/logo.png') }}" alt="" height="30"></span>
                                            </a>
                                        </h2>
                                    </div>
                                    <div class="account-content">
                                        <form class="form-horizontal" action="{{ url('login') }}" method="POST">

                                            {{ csrf_field() }}

                                            <div class="form-group m-b-20">
                                                <div class="col-xs-12">
                                                    <label class="control-label" for="email">Email</label>
                                                    <input class="form-control" type="email" name="email" id="email">
                                                </div>
                                            </div>

                                            <div class="form-group m-b-20">
                                                <div class="col-xs-12">
                                                    <label class="control-label" for="password">Password</label>
                                                    <input class="form-control" type="password" name="password" id="password">
                                                </div>
                                            </div>

                                            <div class="form-group m-b-20">
                                                <div class="col-xs-12">

                                                    <div class="checkbox checkbox-success">
                                                        <input id="remember" type="checkbox" name="remember">
                                                        <label for="remember">Remember me</label>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group text-center m-t-10">
                                                <div class="col-xs-12">
                                                    <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Login</button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- end card-box-->


                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ url('js/jquery.min.js') }}"></script>
        <script src="{{ url('js/bootstrap.min.js') }}"></script>
        <script src="{{ url('js/metisMenu.min.js') }}"></script>
        <script src="{{ url('js/waves.js') }}"></script>
        <script src="{{ url('js/jquery.slimscroll.js') }}"></script>
        <script src="{{ url('plugins/bootstrap-select/js/bootstrap-select.min.js') }}" type="text/javascript"></script>

        <!-- jQuery Validation -->
        <script src="{{ url('plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
        <script src="{{ url('plugins/jquery-validation/js/additional-methods.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ url('js/jquery.core.js') }}"></script>
        <script src="{{ url('js/jquery.app.js') }}"></script>

        <script>
            // validate error
            $.validator.setDefaults({
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                errorElement: 'span',
                errorClass: 'help-block',
                errorPlacement: function(error, element) {
                    if(element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else if (element.hasClass('select2-hidden-accessible')) {     
                        error.insertAfter(element.next('span'));
                    } else if (element.hasClass('upload')) {
                        error.insertAfter(element.closest('.fileupload'));
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

            $("form").validate({
                rules: {
                    email: "required",
                    password: "required",
                },
            });
        </script>

    </body>
</html>