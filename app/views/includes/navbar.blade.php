<div role="navigation" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{{ URL::to('') }}}" class="navbar-brand">Your Brand</a>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop1" href="#" >CRUD<b class="caret"></b></a>
                    <ul aria-labelledby="drop2" role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="{{{ URL::to('islands') }}}" tabindex="-1" role="menuitem">Islands</a></li>
                        <li class="divider" role="presentation"></li>
                        <li role="presentation"><a href="{{{ URL::to('provinces') }}}" tabindex="-1" role="menuitem">Provinces</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop2" href="#" >Management<b class="caret"></b></a>
                    <ul aria-labelledby="drop2" role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="{{{ URL::to('users') }}}" tabindex="-1" role="menuitem">User Login</a></li>
                        <li class="divider" role="presentation"></li>
                        <li role="presentation"><a href="{{{ URL::to('roles') }}}" tabindex="-1" role="menuitem">Roles</a></li>
                    </ul>
                </li>
                <li class="active">
                    <a href="{{{ URL::to('posts') }}}">Post</a>
                </li>
                <li>
                    <a href="{{{ URL::to('slideshows') }}}">Slideshow</a>
                </li>
                <li>
                    <a href="{{{ URL::to('peta') }}}">Peta</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if ( Auth::guest() )
                <li>{{ HTML::link('login', 'Login') }}</li>
                @else
                <li>{{ HTML::link('logout', 'Logout') }}</li>
                @endif
            </ul>
        </nav>
    </div>
</div>
