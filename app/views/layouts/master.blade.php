<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div id="main-container">

    <!-- top-navigation content -->
    @include('includes.navbar')

    <!-- main content -->
    <div id="content">
        @yield('content')
    </div>

</div>

@section('scripts')
@show
</body>
</html>