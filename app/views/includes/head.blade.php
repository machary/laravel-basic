<!--head-->
@section('head')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Laravel Basic</title>
<meta name="description" content="Lemhannas Dashboard">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">
<link rel="shortcut icon" href="favicon.ico">

<!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"> -->
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap/bootstrap-theme.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/custom/form-style.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/datatables/jquery.dataTables.css') }}">

<!-- Scripts-->
<script src="{{ URL::asset('js/jquery/jquery-2.0.0.min.js') }}"></script>
<!--<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script> -->
<script src="{{ URL::asset('js/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/custom.js') }}"></script>


@show
<!--/head-->