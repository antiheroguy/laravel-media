<meta charset="utf-8" />
<title>{{ $title or 'Admin' }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<!-- App favicon -->
<link rel="shortcut icon" href="{{ url('images/icon.ico') }}">

<!-- Sweet Alert -->
<link href="{{ url('plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">

<!-- Bootstrap fileupload css -->
<link href="{{ url('plugins/bootstrap-fileupload/bootstrap-fileupload.css') }}" rel="stylesheet" />

<!-- Select 2 -->
<link href="{{ url('plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ url('plugins/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />

<!-- Date Picker -->
<link rel="stylesheet" href="{{ url('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">

<!-- Daterange picker -->
<link rel="stylesheet" href="{{ url('plugins/bootstrap-daterangepicker/daterangepicker.css') }}">

<!-- App css -->
<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ url('css/core.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ url('css/components.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ url('css/icons.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ url('css/pages.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ url('css/menu.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ url('css/responsive.css') }}" type="text/css" />

<script src="{{ url('js/modernizr.min.js') }}"></script>

<style>
    /* select 2 css */
    .select2-container--bootstrap .select2-selection, .select2-container .select2-selection--single .select2-selection__rendered {
        border-radius: 0 !important;
        line-height: 26px !important;
    }

    .has-error .select2-selection {
        border-color: #f96a74 !important;
        box-shadow: none !important;
    }

    /* border timepicker */
    .bootstrap-timepicker-widget table td input {
        border: 1px solid grey !important;
    }

    /* datepicker */
    .datepicker {
        z-index: 999999 !important;
    }

    /* required label */
    label.required:after {
        color: #dd4b39;
        content: "*";
        font-weight: bold;
        margin-left: 5px;
    }

    /* loading */
    #loading {
        position: fixed;
        top: 0;
        left: 0;
        height:100%;
        width:100%;
        z-index: 9999999;
        background-image: url("{{url('images/loading.gif')}}");
        background-position: center;
        background-repeat: no-repeat;
        display: none;
    }

    /* clear */
    .clear {
        clear: both;
    }
</style>