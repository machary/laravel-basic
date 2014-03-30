<!doctype html>
<html xmlns="http://www.w3.org/1999/html">
	<head>
		<meta charset="utf-8">
        @include('includes.head')
		<style>
			table form { margin-bottom: 0; }
			form ul { margin-left: 0; list-style: none; }
			.error { color: red; font-style: italic; }
			body { padding-top: 20px; }
		</style>
	</head>

	<body>

		<div class="container">
            <!-- top-navigation content -->
             @include('includes.navbar')

            <!-- Success-Messages -->
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Success</h4>
                {{{ $message }}}
            </div>
            @endif

            </br>

			@yield('main')
		</div>

	</body>

</html>