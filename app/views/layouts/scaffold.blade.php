<!doctype html>
<html xmlns="http://www.w3.org/1999/html">
	<head>
        @include('includes.head')
	</head>

	<body>
        <!-- top-navigation content -->
        @include('includes.navbar')

		<div role="main" class="container theme-showcase">


            <!-- Success-Messages -->
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Success</h4>
                {{{ $message }}}
            </div>
            @endif



			@yield('main')
		</div>

	</body>

</html>