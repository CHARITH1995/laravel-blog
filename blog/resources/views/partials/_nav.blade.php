<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid text-center">

        <div class="navbar-header text-center">
            <button type="button" class="navbar-toggle collapsed text-center" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">FUTURE</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav ">
                <li class="{{ Request::is('/') ? "active":"" }}"><a href="/">Home</a></li>
                <li class="{{ Request::is('news') ? "active":"" }} "><a href="/news">Blog</a></li>
                <li class="{{ Request::is('about') ? "active":"" }}"><a href="/about">About</a></li>
            <!-- / <li class="{{ Request::is('contact') ? "active":"" }}"><a href="/contact">contact</a></li> -->

            </ul>
            <div class="col-md-offset-6">

            </div>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello!! {{Auth::user()->name}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('posts.index')}}">Posts</a></li>
                        <li><a href="{{route('categories.index')}}">Categories</a></li>

                        <li role="separator" class="divider"></li>
                        <li><a href="{{url('auth/logout')}}">{{Auth::check()? "Logged Out":" "}}</a></li>
                    </ul>
                </li>
                @else

                    <ul class="nav navbar-nav ">
                    <!-- / <li><a href="{{url('auth/register')}}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
                        <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                    @endif

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>